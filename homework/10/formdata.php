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
function addMessage(object $mysqli, string $name, string $comment)
{
    $sql = "INSERT INTO message (user, message_text) VALUES ($name, $comment)";
    if (!($result = $mysqli->query($sql))) {
        throw new Exception($mysqli->error);
    }
}
try {
    if (isset($_POST['comment'])) {
        echo 'Страница ссылки: ' . $_SERVER['HTTP_REFERER'];
        foreach ($_POST as $key => $value) {
            $_POST[$key] = htmlspecialchars($value, ENT_QUOTES | ENT_HTML5); // ????
            echo "<br>$key: $_POST[$key]<br>"; // htmlspecialchars
        }
        $mysqli = new mysqli("localhost", "root", "", "guestbook");
        $name = $_POST['user'];
        $comment = $_POST['message_text'];
        $sql = "INSERT INTO guestbook.message (user, message_text) VALUES ('$name', '$comment')";
        if (!($result = $mysqli->query($sql))) {
            throw new Exception($mysqli->error);
        }
        header("Location: index.php");
        exit();
    }
} catch (Throwable $e) {
    $error = $e->getMessage();
    include 'template/error.php';
}
?>
</body>
</html>