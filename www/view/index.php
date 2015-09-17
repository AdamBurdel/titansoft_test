<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>
<form style="<?if ((!empty($errors)) || (!empty($result))) {?>display:block<?}?>" action="index.php" enctype="multipart/form-data" method="post" name="newUser" id="form" class="navbar-form pull-left">
    <a class="close-btn" href="javascript:void(0)" onclick = "document.getElementById('form').style.display='none';document.getElementById('fade').style.display='none'">Закрыть</a>
    <h2 class="form_heading">Регистрация</h2>
    <div class="span4">
        <span class="span2 form_labels">Логин</span>
        <input required="Заполните это поле" name="login" type="text" class="span2">
        <?
        if (!empty($errors['login'])) {
            ?><div class="text-error"><p><?=$errors['login']?></p></div><?
        }
        ?>
    </div>
    <div class="span4">
        <span class="span2 form_labels">Пароль</span>
        <input required="Заполните это поле" name="pass" type="password" class="span2">
        <?
        if (!empty($errors['pass'])) {
            ?><div class="text-error"><p><?=$errors['pass']?></p></div><?
        }
        ?>
    </div>
    <div class="span4">
        <span class="span2 form_labels">E-mail</span>
        <input required="Заполните это поле" name="email" type="text" class="span2">
        <?
        if (!empty($errors['email'])) {
            ?><div class="text-error"><p><?=$errors['email']?></p></div><?
        }
        ?>
    </div>
    <?
    if (empty($errors['email'])) {
        ?><div class="text-success"><p><?=$result?></p></div><?
    }
    ?>
    <input id="registration_submit" type="submit" class="btn">
</form>
<div id="modal-information" class="modal-information">

</div>
<div class="wrap">
    <div class="main">
    <header id="header" class="span2">
        <nav>
            <ul class="menu">
                <li><a href="javascript:void(0)" onclick = "document.getElementById('form').style.display='block';document.getElementById('fade').style.display='block'">Регистрация</a></li>
                <li><a href="javascript:void(0)" id="ajaxbtn" onclick = "document.getElementById('modal-information').style.display='block';document.getElementById('fade').style.display='block'"> Информация</a></li>
            </ul>
        </nav>
    </header>
    <main>

    </main>
    </div>
    </div>

    <footer>
       <div id="footer_content">Контент в футере</div>

        <div style="<?if ((!empty($errors)) || (!empty($result))) {?>display:block<?}?>" id="fade" class="black-overlay"></div>
    </footer>
<script>
    $(document).ready(function() {
        $(function() {
                $("input[name*='login").val("<?=$_POST['login']?>");
                $("input[name*='pass").val("<?=$_POST['pass']?>");
                $("input[name*='email").val("<?=$_POST['email']?>");
        })


        $( function() {
            $('#ajaxbtn').click( function() {
                $('#modal-information').load("/view/usersinfo.php");
            } );
        } );

    })

</script>
</body>
</html>