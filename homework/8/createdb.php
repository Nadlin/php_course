<?php
/*
Создать базу данных (например guestbook)
Создать в этой базе данных таблицу (например message), внести в нее тестовые данные
 */
try {
    $mysqli = new mysqli("localhost", "root", "");

    if ($mysqli->connect_errno) {
        throw new Exception($mysqli->connect_error);
    }
    //$sql = 'DROP DATABASE guestbook';
    $sql = 'CREATE DATABASE guestbook';
    if (!($result = $mysqli->query($sql))) {
        throw new Exception($mysqli->error);
    }

    $sql = "CREATE TABLE guestbook.message (id INT NOT NULL AUTO_INCREMENT,
        user VARCHAR(25) NOT NULL, message_text VARCHAR(2000) NOT NULL, 
        message_time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
        PRIMARY KEY (id)) ENGINE = InnoDB";
    if (!($result = $mysqli->query($sql))) {
        throw new Exception($mysqli->error);
    }

    for ($i = 0; $i <= 110; $i++) {
        $user = 'user ' . $i + 1;
        $message = 'Test message from user ' . $i + 1;
        $sql = "INSERT INTO guestbook.message (user, message_text) VALUES ('$user', '$message')";
        if (!($result = $mysqli->query($sql))) {
            throw new Exception($mysqli->error);
        }
    }

} catch(Throwable $e) {
    echo $e->getMessage();
}