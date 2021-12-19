<?php
require 'functions.php';
try {
    if (isset($_POST['edit_message'])) {
        $host = "localhost"; $username = "root"; $password = ""; $dbname = "guestbook"; $message_table = "message";  $file_dest = "";
        $mysqli = connectToDataBase($host, $username, $password, $dbname);
        foreach ($_POST as $key => $value) {
            $_POST[$key] = htmlspecialchars($value, ENT_QUOTES | ENT_HTML5);
        }
        $mysqli = new mysqli("localhost", "root", "", "guestbook");
        updateData($mysqli, $message_table, $_POST['user'], $_POST['message_text'], $_POST['id']);
        header("Location: index.php");
        exit();
    }
} catch (Throwable $e) {
    $error = $e->getMessage();
    include 'template/error.php';
}
