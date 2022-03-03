<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Работаем с AJAX</title>
        <script src="ajax.js"></script><!--подключаем AJAX-->
    </head>
    <body>
        <h1>
            ПРИМЕР ОТПРАВКИ ФОРМЫ В AJAX
        </h1>
        <div id = "auth">
            <p>Вход в систему</p>
            <form>
                <p id="autherror"></p><!-- для сообщения об ошибке -->
                <p>Логин <input name="username" id="username" value=""/><br />
                    Пароль <input type="password" name="password" id="password" value=""/></p>
                <input type="button" value="Вход" onClick="sendRequest();"/><br />
            </form>
        </div>
        <div>
            <p>Основное содержимое страницы</p>
        </div>
    </body>
</html>