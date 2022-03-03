<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Работаем с AJAX</title>
    <script src="rest.js"></script><!--подключаем AJAX-->
</head>
<body>
<h1>
    ПРИМЕР ОТПРАВКИ ФОРМЫ В AJAX
</h1>
<div>
    <form name="rest">
        <p>ID <input type="text" name="id" id="id" value=""><br>
            VALUE <input type="text" name="val" id="val" value=""></p>
        <input type="button" value="GET" onClick="sendRequest(this);"><br>
        <input type="button" value="POST" onClick="sendRequest(this);"><br>
        <input type="button" value="PUT" onClick="sendRequest(this);"><br>
        <input type="button" value="DELETE" onClick="sendRequest(this);"><br>
        <input type="button" value="HEAD" onClick="sendRequest(this);"><br>
    </form>
</div>
<div id = "answer"></div>
<div>
    <p>Основное содержимое страницы</p>
</div>
</body>
</html>
