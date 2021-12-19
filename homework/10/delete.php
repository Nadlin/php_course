<?php
require 'functions.php';
try {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $host = "localhost"; $username = "root"; $password = ""; $dbname = "guestbook"; $message_table = "message";
        $mysqli = connectToDataBase($host, $username, $password, $dbname);
        deleteMessage($mysqli, $message_table, $id,);
        header("Location: index.php");
        exit();
    }
} catch (Throwable $e) {
    $error = $e->getMessage();
    include 'template/error.php';
}

