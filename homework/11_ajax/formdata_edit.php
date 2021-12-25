<?php
require 'functions.php';
require 'config.php';

try {
    if (isset($_POST['edit_message'])) {
        header("Content-type: text/plain; charset=UTF-8");
        $mysqli = connectToDataBase($host, $username, $password, $dbname);
        foreach ($_POST as $key => $value) {
            $_POST[$key] = htmlspecialchars($value, ENT_QUOTES | ENT_HTML5);
        }
        updateData($mysqli, $message_table, $_POST['user'], $_POST['message_text'], $_POST['id']);
        echo '
            <div id="' . $_POST['id'] . '" class="info">
                <p><b>User: </b>' . $_POST['user'] . '</p>
                <p><b>Message:</b> ' . $_POST['message_text'] . '</p>
                <p><b>Time</b>:' . $_POST['message_time'] . '</p>
                <p class="action">
                <a href="" onClick="editMessage(event, ' . $_POST['id'] . ')">Редактировать</a>
                <a href="" onClick="deleteMessage(event, ' . $_POST['id'] . ')">Удалить</a></p>              
                </p>
                <div id="message" class="-success">Cообщение было успешно отредактировано</div>
            </div>
            ';
    } else {
        throw new Exception('Сообщение не может быть отредактировано');
    }
} catch (Throwable $e) {
    $error = $e->getMessage();
    include 'template/error.php';
}
