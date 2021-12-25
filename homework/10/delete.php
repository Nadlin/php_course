<?php
require 'functions.php';
require 'config.php';
try {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $mysqli = connectToDataBase($host, $username, $password, $dbname);
        deleteMessage($mysqli, $message_table, $id,);
        header("Location: index.php");
        exit();
    } else {
        throw new Exception('Сообщение не может быть удалено, не хватает данных для удаления сообщения');
    }
} catch (Throwable $e) {
    $error = $e->getMessage();
    include 'template/error.php';
}

