<?php
require 'functions.php';
require 'config.php';
try {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $mysqli = connectToDataBase($host, $username, $password, $dbname);
        $message = getDataForEditing($mysqli, $message_table, $id);
    } else {
        header("Location: template/error-page.php");
    }
} catch (Throwable $e) {
    $error = $e->getMessage();
    include 'template/error.php';
}
?>
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
<h4>Отредактируйте свой комментарий</h4>
<form name="leave_comment_file" enctype="multipart/form-data" method="POST" action="formdata_edit.php">
    <input type="text" name="user" value="<?= $message['user'] ?>" required><br>
    <textarea name="message_text" rows="5" required><?= $message['message_text'] ?></textarea><br>
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="submit" name="edit_message" value="Отредактировать комментарий">
</form>
</body>
</html>




