<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Работа с базой данных</title>
    <style>
        input, textarea {
            padding: 10px
        }
        input {
            margin-bottom: 20px;
        }
        textarea {
            width: 350px;
        }
    </style>
</head>
<body>
<h2>Обработка формы</h2>

<?php
require 'functions.php';
try {

    if (isset($_POST['edit_message'])) {
        echo 'Страница ссылки: ' . $_SERVER['HTTP_REFERER'];

        foreach ($_POST as $key => $value) {
            $_POST[$key] = htmlspecialchars($value, ENT_QUOTES | ENT_HTML5);
            echo "<br>$key: $_POST[$key]<br>";
        }

        $mysqli = new mysqli("localhost", "root", "", "guestbook");
        updateData($mysqli, $_POST['user'], $_POST['message_text'], $_POST['id']);

        header("Location: index-file-edit-delete.php");
        exit();


    }
} catch (Throwable $e) {
    $error = $e->getMessage();
    include 'template/error.php';
}


?>
</body>
</html>