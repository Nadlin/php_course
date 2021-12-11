<?php
try {
    $mysqli = new mysqli("localhost", "root", "", "guestbook");
    if ($mysqli->connect_errno) {
        throw new Exception($mysqli->connect_error);
    }


    $sql = 'SELECT COUNT(*) FROM message';
    if (!($result = $mysqli->query($sql))) {
        throw new Exception($mysqli->error);
    }
    $n = $result->fetch_row()[0];

    echo "$n строк<br>";

    //$k = 0;
    $messages_per_page = 5;
    $currentPage = 2;
    function getFirstCurrentParagraph(int $currentPage, int $paragraphs_per_page): int
    {
        return ($currentPage - 1) * $paragraphs_per_page;
    }

    $k = getFirstCurrentParagraph($currentPage, $messages_per_page);



    //$sql = "SELECT * FROM message ORDER BY id DESC LIMIT $k, 5";
    $sql = "SELECT * FROM message ORDER BY id DESC LIMIT $k, $messages_per_page";

    if (!($result = $mysqli->query($sql))) {
        throw new Exception($mysqli->error);
    }
    $data = $result->fetch_all(MYSQLI_ASSOC);
    //$result->free();
    foreach ($data as $row) {
        echo $row['id'] . '. ' . $row['user'] . ' - ' .
            $row['message_text'] . ' (' . $row['message_time'] . ')<br/>';
    }
    //$mysqli->close();
} catch(Throwable $e) {
    echo $e->getMessage();
}
