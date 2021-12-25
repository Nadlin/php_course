<?php
require 'functions.php';
require 'config.php';
try {
    if (isset($_POST['edit_message'])) {
        $file_dest = "";
        $mysqli = connectToDataBase($host, $username, $password, $dbname);
        foreach ($_POST as $key => $value) {
            $_POST[$key] = htmlspecialchars($value, ENT_QUOTES | ENT_HTML5);
        }
        updateData($mysqli, $message_table, $_POST['user'], $_POST['message_text'], $_POST['id']);
        header("Location: index.php");
        exit();
    } else {
        header("Location: template/error-page.php");
        exit();
    }
} catch (Throwable $e) {
    $error = $e->getMessage();
    include 'template/error.php';
}
