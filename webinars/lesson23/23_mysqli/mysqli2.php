<?php
$mysqli = new mysqli("localhost", "root", "", "timetable");
if ($mysqli->connect_errno) {
    echo 'Не удалось подключиться к БД: '.$mysqli->connect_error;
    exit();
}
if (!$mysqli->set_charset("utf8")) {
    echo 'Ошибка при загрузке набора символов utf8: '.$mysqli->error;
    exit();
}
$sql='SELECT surname, name, middlename FROM teachers ORDER BY surname, name';
if ($result = $mysqli->query($sql)){
    $res = $result->fetch_all(MYSQLI_ASSOC);
}
else die('Ошибка запроса: '.$mysqli->error);
$mysqli->close();
foreach ($res as $r){
    echo $r['surname'].' '.$r['name'].' '.$r['middlename'].'<br/>';
}
