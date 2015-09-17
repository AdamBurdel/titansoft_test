<?php
header('Content-Type: text/html; charset=utf-8');
require_once __DIR__ . '/../models/userRegistration.php';?>

<a class="close-btn" href="javascript:void(0)" onclick = "document.getElementById('modal-information').style.display='none';document.getElementById('fade').style.display='none'">Закрыть</a>
<span>Зарегистрировано пользователей: <?countUsers()?> </span><br>
<span>Первый пользователь зарегистрировался: <?firstUser()?> </span><br>
<span>Последний пользователь зарегистрировался:<?lastUser()?> </span><br>