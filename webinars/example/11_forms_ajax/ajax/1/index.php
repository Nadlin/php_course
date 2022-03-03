<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Работаем с AJAX</title>
    <script src="ajax1.js"></script><!--подключаем AJAX-->
</head>
<body>
<h1>ПРИМЕР РАБОТЫ С AJAX</h1>
<p>Введите отправляемые на сервер данные по технологии AJAX</p>
<form>
    <p><input name="ajaxdata" type="text" value="" id="ajaxdata" size="100" maxlength="100" onChange="sendRequest();"></p>
    <!--или альтернативный вариант по нажатию кнопки-->
    <p><input type="button" value="Отправить" id="button" onClick="sendRequest();"></p>
</form>
<h2>А здесь будет выведен ответ сервера</h2>
<div id="result">?</div>
</body>
</html>