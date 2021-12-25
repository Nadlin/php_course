<?php
require 'functions.php';
require 'config.php';
try {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        header("Content-type: text/plain; charset=UTF-8");
        $id = $_GET['id'];
        $mysqli = connectToDataBase($host, $username, $password, $dbname);
        deleteMessage($mysqli, $message_table, $id,);
        echo '<div id="message" class="-success">Cообщение было удалено</div>';
    } else {
        throw new Exception('Сообщение не может быть удалено, не хватает данных для удаления сообщения');
    }
} catch (Throwable $e) {
    $error = $e->getMessage();
    include 'template/error.php';
}

