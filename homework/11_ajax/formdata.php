<?php
require 'functions.php';
require 'config.php';
try {
    if (isset($_POST['comment'])) {
        if (!empty($_POST['user']) && !empty($_POST['message_text'])) {
            //echo 'Страница ссылки: ' . $_SERVER['HTTP_REFERER'];
            foreach ($_POST as $key => $value) {
                $_POST[$key] = htmlspecialchars($value, ENT_QUOTES | ENT_HTML5);
                // echo "<br>$key: $_POST[$key]<br>";
            }
            $file_dest = "";
            $mysqli = connectToDataBase($host, $username, $password, $dbname);
            //var_dump($_FILES); exit();

            if ($_FILES['file']['error'] == 0 && ($_FILES['file']['type'] == 'image/png' || $_FILES['file']['type'] == 'image/jpeg')) {
                // $file_dest = 'images/' . $_FILES['file']['name'];
                $file_dest = 'images/' . time() . mt_rand(100, 999) . '.jpg';
                $isFileLoaded = move_uploaded_file ($_FILES['file']['tmp_name'] , $file_dest);
                if (!$isFileLoaded) {
                    $file = $_FILES['file']['name'];
                    throw new Exception("Файл $file не был загружен.");
                }
            }

            addData($mysqli, $message_table, $_POST['user'], $_POST['message_text'], $file_dest);
            $file = $_FILES['file']['name'];
            header("Location: index.php");
            exit();
        } else {
            throw new Exception('Ваше сообщение не может быть опубликовано');
        }
    } else {
        throw new Exception('Cообщение не может быть опубликовано');
    }
} catch (Throwable $e) {
    $error = $e->getMessage();
    include 'template/error.php';
}

