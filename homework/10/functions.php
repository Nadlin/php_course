<?php

function getPage(): int
{
    return isset($_GET['page']) ? checkRequiredPage($_GET['page']) : 1;
}

function checkRequiredPage(string $value): int
{
    return is_numeric($value) && intval(abs($value)) == $value ? $value : 0;
}

function getPages(int $total, int $number_per_page): int
{
    return ceil($total / $number_per_page);
}

function getFirstCurrentMessage(int $currentPage, int $messages_per_page): int
{
    return ($currentPage - 1) * $messages_per_page;
}

function connectToDataBase(string $host, string $username, string $password, string $dbname): object
{
    return new mysqli($host, $username, $password, $dbname);
}

function countMessagesFromDB(object $mysqli, string $table_name): int
{
    $sql = "SELECT COUNT(*) FROM $table_name"; // в count можно указывать идентификатор и др., но для подсчета строк лучше использовать *
    // можно использовать псевдоним 'SELECT COUNT(*) as XXX FROM message' и потом обращаться по нему, можно и без as, сразу имя псевдонима
    if (!($result = $mysqli->query($sql))) {
        throw new Exception($mysqli->error);
    }

    return $result->fetch_row()[0];
}

function getCurrentMessages(object $mysqli, string $table_name, int $first_message, int $messages_per_page): array
{
    $sql = "SELECT * FROM $table_name ORDER BY id DESC LIMIT $first_message, $messages_per_page";
    if (!($result = $mysqli->query($sql))) {
        throw new Exception($mysqli->error);
    }

    return  $result->fetch_all(MYSQLI_ASSOC);
}

function addData(object $mysqli, string $table_name, string $name, string $comment, string $file_url)
{
    if ($file_url) {
        $sql = "INSERT INTO $table_name (user, message_text, avatar) VALUES ('$name', '$comment', '$file_url')";
    } else {
        $sql = "INSERT INTO $table_name (user, message_text) VALUES ('$name', '$comment')";
    }

    if (!($result = $mysqli->query($sql))) {
        throw new Exception($mysqli->error);
    }
}

function getDataForEditing(object $mysqli, string $table_name, int $id)
{
    $sql = "SELECT user, message_text FROM $table_name WHERE id = $id";
    if (!($result = $mysqli->query($sql))) {
        throw new Exception($mysqli->error);
    }
    $message = $result->fetch_all(MYSQLI_ASSOC);

    return $message[0];
}

function updateData(object $mysqli, string $table_name, string $name, string $comment, string $id)
{
    $sql = "UPDATE $table_name SET user = '$name', message_text = '$comment' WHERE id = $id";
    if (!($result = $mysqli->query($sql))) {
        throw new Exception($mysqli->error);
    }
}

function deleteMessage(object $mysqli, string $table_name, int $id)
{
    $sql1 = "SELECT avatar FROM $table_name  WHERE id = $id";
    if (!($result1 = $mysqli->query($sql1))) {
        throw new Exception($mysqli->error);
    }
    $file_url = $result1->fetch_all(MYSQLI_ASSOC);
    if ($file_url[0]['avatar']) {
        unlink($file_url[0]['avatar']);
    }

    $sql2 = "DELETE FROM $table_name WHERE id = $id";
    if (!($result2 = $mysqli->query($sql2))) {
        throw new Exception($mysqli->error);
    }
}

