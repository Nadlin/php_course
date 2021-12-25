<?php
require 'functions.php';
require 'config.php';

try {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        header("Content-type: text/plain; charset=UTF-8");
        $id = $_GET['id'];
        $mysqli = connectToDataBase($host, $username, $password, $dbname);
        $message = getDataForEditing($mysqli, $message_table, $id);

        echo '
            <div id="' . $id .'" class="info">
                <form name="editing">
                    <p><b>User: </b><p><p><input type="text" id="user' . $id . '" name="user" value="' . $message['user'] . '" required><br></p>
                    <p><b>Message:</b><p><textarea id="message_text' . $id . '" name="message_text" rows="5" required>' . $message['message_text'] . '</textarea><br>
                    <input type="hidden" id="id' . $id . '" name="id" value="' . $id . '">
                    <input type="hidden" id="time' . $id . '" name="time" value="' . $message['message_time'] . '">
                    <input type="button" id="edit_message' . $id . '" name="edit_message" value="Отредактировать комментарий" onClick="saveEditedMessage(' . $id . ')">
                </form>                                      
            </div>
            ';
    } else {
        throw new Exception('Сообщение не может быть отредактировано');
    }
} catch (Throwable $e) {
    $error = $e->getMessage();
    include 'template/error.php';
}



