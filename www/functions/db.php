<?php

function config()
{
    return include __DIR__ . '/../config.php';
};

function DBconnect()
{
    $config = config();
    mysql_connect(
        $config['db']['host'],
        $config['db']['root'],
        $config['db']['password']
    );
    mysql_select_db($config['db']['DBName']);
//    if (!res) {
//        die('Ошибка соединения: ' . mysql_error());
//    }
//    echo 'Успешно соединились';
};

function DBQuerrySelectFrom($sql)
{
    DBconnect();
    $res = mysql_query($sql);
    if (!$res) {
        return array();
    }
    $ret = array();
    while ($row = mysql_fetch_assoc($res)) {
        $ret[] = $row;
    }
    return $ret;
}


function DBInsert($sql)
{
    DBconnect();
    return mysql_query($sql);
}