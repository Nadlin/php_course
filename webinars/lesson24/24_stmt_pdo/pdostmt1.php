<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=timetable;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdostmt = $pdo->prepare("SELECT
          position, surname, name, middlename
        FROM teachers
          INNER JOIN positions
            ON teachers.idposition = positions.idposition
        WHERE positions.position = ?");
    $position = 'Профессор';
    $pdostmt->bindParam(1, $position, PDO::PARAM_STR);
    $pdostmt->execute();
    $pdostmt->bindColumn(1, $col1);
    $pdostmt->bindColumn(2, $col2);
    $pdostmt->bindColumn(3, $col3);
    $pdostmt->bindColumn(4, $col4);
    while ($row = $pdostmt->fetch(PDO::FETCH_BOUND)) {
        echo "$col1 $col2 $col3 $col4<br/>";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
