<?php
$dblink = mysqli_connect('localhost', 'root', '', 'timetable')
or die('Не удалось подключиться к базе данных: ' . mysqli_connect_error());
if (!mysqli_set_charset($dblink, 'utf8')) {
    echo 'Ошибка при загрузке набора символов utf8: ' . mysqli_error($dblink);
    exit();
}
$sql = 'SELECT surname, name, middlename FROM teachers ORDER BY surname, name';
$result = mysqli_query($dblink, $sql);
if ($result) {
    while ($str = mysqli_fetch_assoc($result)) {
        echo '<p>' . $str['surname'] . ' ' . $str['name'] . ' ' . $str['middlename'] . '</p>';
    }
} else {
    echo 'Ошибка запроса: ' . mysqli_errno($dblink) . ' - ' . mysqli_error($dblink);
}
mysqli_close($dblink);