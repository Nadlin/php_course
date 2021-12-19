<?php
/*
Добавление сообщения c файлом / редактирование / удаление сообщения
 */
require 'functions.php';
try {
    $page = getPage();
    $host = "localhost"; $username = "root"; $password = ""; $dbname = "guestbook"; $message_table = "message";
    $messages_per_page = 10;

    $mysqli = connectToDataBase($host, $username, $password, $dbname);
    $messageCount = countMessagesFromDB($mysqli, $message_table);
    $pages = getPages($messageCount, $messages_per_page);

    if (!$page || $page > $pages) throw new Exception('Вы некорректно ввели страницу. Такой страницы не существует');

    $first_message = getFirstCurrentMessage($page, $messages_per_page);
    $current_messages = getCurrentMessages($mysqli, $message_table, $first_message, $messages_per_page);
    include 'template/page.php';

} catch (Throwable $e) {
    $error = $e->getMessage();
    include 'template/error.php';
}





