<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $mysqli = new mysqli("localhost", "root", "", "timetable");
    $query = "SELECT
      positions.position,
      teachers.surname,
      teachers.name,
      teachers.middlename
    FROM teachers
      INNER JOIN positions
        ON teachers.idposition = positions.idposition
    WHERE positions.position = ?";
    $position = 'Профессор';
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query);
    $stmt->bind_param("s", $position);
    $stmt->execute();
    //  Вариант по bind_result
    $stmt->bind_result($col1, $col2, $col3, $col4);
    while ($stmt->fetch()) {
        echo "$col1 $col2 $col3 $col4<br/>";
    }
    //  Вариант по get_result
    /*    $result = $stmt->get_result();
        while ($row = $result->fetch_assoc() {
            var_dump($row);
            echo '<br/>';
        }*/
    $stmt->close();
    $mysqli->close();
} catch(Throwable $e) {
    die($e->getMessage());
}
