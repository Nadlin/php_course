<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=timetable;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdostmt = $pdo->prepare("SELECT
          position, surname, name, middlename
        FROM teachers
          INNER JOIN positions
            ON teachers.idposition = positions.idposition
        WHERE positions.position = :position");
    $position = [':position' => 'Профессор'];
    $pdostmt->execute($position);
    $res = $pdostmt->fetchAll(PDO::FETCH_CLASS);
    var_dump($res);
} catch (PDOException $e) {
    echo $e->getMessage();
}
