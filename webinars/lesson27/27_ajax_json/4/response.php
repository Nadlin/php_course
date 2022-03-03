<?php
if ($_SERVER['REQUEST_METHOD'] == 'HEAD') {
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    exit();
}
//указываем формат ответа JSON
header("Content-type: application/json; charset=utf-8");
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $answer = $_SERVER['REQUEST_METHOD'] . ' ...';
} else {
//Получаем данные запроса из php://input
    $requestJSON = file_get_contents('php://input');
    $requestData = json_decode($requestJSON);

    $answer = $_SERVER['REQUEST_METHOD'] . ': ' . $requestData->id . ', ' . $requestData->val;
}
echo json_encode($answer);