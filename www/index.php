<?php
header('Content-Type: text/html; charset=utf-8');
require_once __DIR__ . '/models/userRegistration.php';

DBconnect();

if (!empty($_POST)) {
    $regitrationdate = time();
    $errors = array();
    if (!empty($_POST["login"])){
        $login = $_POST["login"];
    }
    else {
        $errors['login'] = 'поле Логин не может быть пустым';
    }
    //Проверка правильности email
    if (!empty($_POST["email"])) {
        if
        (!preg_match("/^[a-z][a-z0-9_\.\-]{1,23}@([a-z][a-z0-9\-]{1,24}\.){1,3}[a-z]{2,6}$/i", ($email = trim($_POST["email"])))
        ) {
            $errors['email'] = "Неподходящий Email адрес";
        } //Проверка на существование имейла в бд
        elseif (emailCheck()) {
            $errors['email'] = "Такой email уже зарегистрирован";
        } //Добавляем имэйл.
        else {
            $email = $_POST["email"];
        }
    }
    else {
        $errors['email'] = "поле Email не может быть пустым";
    }

    if (!empty($_POST['pass'])) {
        $pass = strlen($_POST['pass']);
        //Проверяем длинну пароля
        if ($pass < 6) {
            $errors['pass'] = "Пароль должен содержать минимум 6 символов";
        } //Добавляем пароль
        else {
            $pass = md5($_POST["pass"]);
        }
    }
    else {
        $errors['pass'] = "пароль не может быть пустым";
    }
    //Тут уже отправка
    if (empty($errors)) {
        $res = addNewUser($login, $email, $pass,$regitrationdate);
        $result = 'Пользователь успешно зарегистрирован';
    }

}


 include 'view/index.php';

//Тесты

//$link = DBconnect();
//$res = mysql_query("SELECT COUNT * FROM users", $link);
//$row = mysql_fetch_row($res);
//$users = $row[0];
//echo $users;

$result = mysql_query("SELECT * FROM users");
$num_rows = mysql_num_rows($result);


?>
