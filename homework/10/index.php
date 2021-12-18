<?php
/*
Добавление сообщения c файлом / редактирование / удаление сообщения
 */
require 'functions.php';
try {
    $page = getPage();
    // connect в базу отдельной функцией
    $mysqli = new mysqli("localhost", "root", "", "guestbook");
    $sql = 'SELECT COUNT(*) FROM message'; // в count можно указывать идентификатор и др., но для подсчета строк лучше использовать *
    // можно использовать псевдоним 'SELECT COUNT(*) as XXX FROM message' и потом обращаться по нему, можно и без as, сразу имя псевдонима
    if (!($result = $mysqli->query($sql))) {
        throw new Exception($mysqli->error);
    }
    $messageCount = $result->fetch_row()[0];
    $messages_per_page = 10;
    $pages = getPages($messageCount, $messages_per_page);
    if (!$page || $page > $pages) throw new Exception('Вы некорректно ввели страницу. Такой страницы не существует');
    $first_message = getFirstCurrentMessage($page, $messages_per_page);
    $sql = "SELECT * FROM message ORDER BY id DESC LIMIT $first_message, $messages_per_page";
    if (!($result = $mysqli->query($sql))) {
        throw new Exception($mysqli->error);
    }
    $current_messages = $result->fetch_all(MYSQLI_ASSOC);
    include 'template/page.php';

} catch (Throwable $e) {
    $error = $e->getMessage();
    include 'template/error.php';
}

// Notes! можно было бы переменную $mysqli передавать в функцию и запрос в базу за выборкой данных писать в функции




