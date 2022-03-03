<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=timetable;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT surname, name, middlename
        FROM teachers INNER JOIN positions ON teachers.idposition = positions.idposition
        WHERE position = 'Профессор'";
    $result = $pdo->query($query, PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo $row['surname'] . ' ' . $row['name'] . ' ' . $row['middlename'] . '<br/>';
    }
    $pdo = NULL;  //Закрываем соединение
} catch (PDOException $e) {
    echo $e->getMessage();
}
