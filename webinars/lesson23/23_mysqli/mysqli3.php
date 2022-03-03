<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
/* или
$driver = new mysqli_driver();
$driver->report_mode = MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT;
*/

try {
    $mysqli = new mysqli("localhost", "root", "", "timetable");
    $mysqli->set_charset("utf8");
    $sql = 'SELECT surname, name, middlename FROM teachers ORDER BY surname, name';
    $result = $mysqli->query($sql);
    var_dump($result->fetch_fields());
    $res = $result->fetch_all(MYSQLI_ASSOC);
    $mysqli->close();
    foreach ($res as $r){
        echo $r['surname'].' '.$r['name'].' '.$r['middlename'].'<br/>';
    }
} catch(Throwable $e) {
    die($e->getMessage());
}
