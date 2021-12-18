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

function addData(object $mysqli, string $name, string $comment, string $file_url)
{
    $sql = "INSERT INTO guestbook.message (user, message_text, avatar) VALUES ('$name', '$comment', '$file_url')";
    if (!($result = $mysqli->query($sql))) {
        throw new Exception($mysqli->error);
    }
}

function getDataForEditing(object $mysqli, int $id)
{
    $sql = "SELECT user, message_text FROM message  WHERE id = $id";
    if (!($result = $mysqli->query($sql))) {
        throw new Exception($mysqli->error);
    }
    $message = $result->fetch_all(MYSQLI_ASSOC);
    return $message[0];
}

function updateData(object $mysqli, string $name, string $comment, string $id)
{
    $sql = "UPDATE guestbook.message SET user = '$name', message_text = '$comment' WHERE id = $id";
    if (!($result = $mysqli->query($sql))) {
        throw new Exception($mysqli->error);
    }
}

function deleteMessage(object $mysqli, int $id)
{
    $sql = "DELETE FROM guestbook.message WHERE id = $id";
    if (!($result = $mysqli->query($sql))) {
        throw new Exception($mysqli->error);
    }
}

