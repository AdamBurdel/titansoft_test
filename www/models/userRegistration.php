<?php

require_once __DIR__ . '/../functions/db.php';

function addNewUser($login,$email,$pass,$regitrationdate)
{
    return DBInsert('
        INSERT INTO  users (
        name,
        email,
        pass,
        regitrationdate
        )
        VALUES (
        "'.$login.'", "'.$email.'", "'.$pass.'", "'.$regitrationdate.'"
        );
    ');

}

function emailCheck()
{
    DBconnect();
    $res = mysql_query('
        SELECT * FROM users
        WHERE
        email = "'.$_POST["email"].'"
    ');
    $ret = array();
    while ($row = mysql_fetch_assoc($res)) {
        $ret[] = $row;
    }
    if (!empty($ret)) {
        return true;
    }
    else {
        return false;
    }
}

function countUsers()
{
    DBconnect();
    $result = mysql_query("SELECT * FROM users");
    $num_rows = mysql_num_rows($result);
    echo $num_rows;
}

function firstUser()
{
    DBconnect();
    $res = mysql_query('
        SELECT * FROM users
    ');
    $ret = array();
    while ($row = mysql_fetch_assoc($res)) {
        $ret[] = $row;
    }
    $newRet = array();
    foreach ($ret as $arRet) {
        $newRet[] = $arRet['id'];
    }
    $result = min($newRet);

    $arRes = mysql_query('
        SELECT * FROM users
        WHERE
        id= "'.$result.'"
    ');

    $arRet = array();
    while ($ow = mysql_fetch_assoc($arRes)) {
        $arRet = $ow;
    }

    $firstUserTime = (int)$arRet['regitrationdate'];
    $atm = time();
    $timeNow = (int)$atm;

    $timeRes = $atm - $firstUserTime;


    if ($timeRes <60) {
        echo $timeRes . ' Секунд назад';
    }
    elseif (($timeRes < 3600) and ($timeRes > 60) ) {
        $newTimeRes = $timeRes/60;
        $timeRes = (int)$newTimeRes;
        echo $timeRes . ' минут назад';
    }

    elseif (($timeRes < 86400) and ($timeRes > 3600) ) {
        $newTimeRes = $timeRes/3600;
        $timeRes = (int)$newTimeRes;
        echo $timeRes . ' часов назад';
    }
    elseif (($timeRes < 604800) and ($timeRes > 86400) ) {
        $newTimeRes = $timeRes/86400;
        $timeRes = (int)$newTimeRes;
        echo $timeRes . ' недель назад';
    }

}

function lastUser()
{
    DBconnect();
    $res = mysql_query('
        SELECT * FROM users
    ');
    $ret = array();
    while ($row = mysql_fetch_assoc($res)) {
        $ret[] = $row;
    }
    $newRet = array();
    foreach ($ret as $arRet) {
        $newRet[] = $arRet['id'];
    }

    $result = max($newRet);

    $arRes = mysql_query('
        SELECT * FROM users
        WHERE
        id= "'.$result.'"
    ');

    $arRet = array();
    while ($ow = mysql_fetch_assoc($arRes)) {
        $arRet = $ow;
    }

    $firstUserTime = (int)$arRet['regitrationdate'];
    $atm = time();
    $timeNow = (int)$atm;

    $timeRes = $atm - $firstUserTime;


    if ($timeRes <60) {
        echo $timeRes . ' Секунд назад';
    }
    elseif (($timeRes < 3600) and ($timeRes > 60) ) {
        $newTimeRes = $timeRes/60;
        $timeRes = (int)$newTimeRes;
        echo $timeRes . ' минут назад';
    }
    elseif (($timeRes < 86400) and ($timeRes > 3600) ) {
        $newTimeRes = $timeRes/3600;
        $timeRes = (int)$newTimeRes;
        echo $timeRes . ' часов назад';
    }
    elseif (($timeRes < 604800) and ($timeRes > 3600) ) {
        $newTimeRes = $timeRes/86400;
        $timeRes = (int)$newTimeRes;
        echo $timeRes . ' недель назад';
    }

}
