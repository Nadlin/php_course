<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Работаем с AJAX</title>
    <script src="ajax1.js"></script><!--подключаем AJAX-->
</head>
<body>
<h1>
    ПРИМЕР ОТПРАВКИ ФОРМЫ В AJAX
</h1>
<div id="auth">
    <p>Вход в систему</p>
    <form name="login">
        <p>Логин <input name="username" id="username" value=""/><br/>
            Пароль <input type="password" name="password" id="password" value=""/></p>
        <input type="button" value="Вход" onClick="sendRequest();"/><br/>
    </form>
</div>
<div>
    <p>Основное содержимое страницы</p>
</div>
</body>
</html>