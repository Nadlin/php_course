<?php
//указываем формат ответа XML
header("Content-type: application/xml; charset=utf-8");
//Получаем данные запроса POST
//это не форма, поэтому они не попадают в $_POST
//получаем данные из php://input
$requestXml = simplexml_load_file('php://input');
$username = $requestXml->username->__toString();
$password = $requestXml->password->__toString();

$answerXML = new SimpleXMLElement("<?xml version='1.0'?><answer></answer>");
if (!empty($username) && !empty($password)) {
    //конечно проверка должна быть по полной программе с организацией сессии, а не только на пустоту
    //если проверка успешна
    $answerXML->addChild('error');
    $answerXML->addChild('message', $username . ', здравствуйте.');
} else {
    //если проверка данных не прошла
    $answerXML->addChild('error', 'Ошибка при авторизации');
    $answerXML->addChild('message', 'Неверный логин или пароль.');
}
echo $answerXML->asXML();