<?php
//номер страницы
$page = intval($_GET['page'] ?? 1);
if ($page < 1) {
    $error = 'Запрошенная страница не существует';
    include 'template/error.php';
    exit();
}
//echo $page;

//формируем массив данных
$data = [];

for ($i=0; $i < 95; $i++) {
    $data[$i] = 'Сообщение ' . ($i + 1);
}
/*
for ($i = 0; $i < 95; $i++) {
    $user = 'User' . mt_rand(1, 10);
    $topic = 'Тема ' . mt_rand(1, 5);
    $message = 'Сообщение ' . ($i + 1);
    $data[$i] = ['user' => $user, 'topic' => $topic, 'message' => $message];
}
*/
//var_dump($data);
//exit();
//извлекаем данные
$itemsPerPage = 10;
$itemsCount = count($data);
$pagesCount = ceil($itemsCount/$itemsPerPage);
if($pagesCount == 0) { //если данных нет
    $pagesCount = 1; //то одна страница, хоть и пустая, все равно должна быть
}
if ($page > $pagesCount) {
    $error = 'Запрошенная страница не существует';
    include 'template/error.php';
    exit();
}
$firstNumber = ($page - 1) * $itemsPerPage;
$pageData = array_slice($data, $firstNumber, $itemsPerPage);
//var_dump($pageData);

include 'template/page.php';
