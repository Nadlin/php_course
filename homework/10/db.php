<?php
/*
Добавление нового столбца в базу для адреса изображений
 */
try {
    $mysqli = new mysqli("localhost", "root", "", "guestbook");
    if ($mysqli->connect_errno) {
        throw new Exception($mysqli->connect_error);
    }
    $sql = "ALTER TABLE guestbook.message ADD avatar VARCHAR(40) NULL";
    if (!($result = $mysqli->query($sql))) {
        throw new Exception($mysqli->error);
    }
} catch(Throwable $e) {
    echo $e->getMessage();
}