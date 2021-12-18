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

    if (isset($_POST['comment'])) {
        echo 'Страница ссылки: ' . $_SERVER['HTTP_REFERER'];
        foreach ($_POST as $key => $value) {
            $_POST[$key] = htmlspecialchars($value, ENT_QUOTES | ENT_HTML5);
            echo "<br>$key: $_POST[$key]<br>"; // htmlspecialchars
        }

        $mysqli = new mysqli("localhost", "root", "", "guestbook");
        var_dump($_FILES);

        if ($_FILES['file']['error'] == 0) {
           // $file_dest = 'images/' . $_FILES['file']['name'];
            //$file_dest = 'images/' . time() . mt_rand(10, 99) . '.jpg'; // не влазит в базу  - ошибка, надо наверное увеличить значение
            $file_dest = 'images/' . mt_rand(100000, 999999) . '.jpg';
            $isFileLoaded = move_uploaded_file ($_FILES['file']['tmp_name'] , $file_dest);
        }

        addData($mysqli, $_POST['user'], $_POST['message_text'], $file_dest);
        $file = $_FILES['file']['name'];
        if ($isFileLoaded) {

            echo "Файл $file был успешно загружен";
        } else {
            $err_code = $_FILES['file']['error'];
            echo "Файл $file не был загружен. Код ошибки $err_code";
        }

        header("Location: index-file.php");
        exit();


    }
} catch (Throwable $e) {
    $error = $e->getMessage();
    include 'template/error.php';
}
?>
</body>
</html>