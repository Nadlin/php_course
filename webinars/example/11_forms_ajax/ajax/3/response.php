<?php
//указываем кодировку отправляемых данных
header("Content-type: text/plain; charset=UTF-8");
if (!empty($_POST['username']) && !empty($_POST['password'])) //конечно проверка должна быть по полной программе с организацией сессии, а не только на пустоту
{
    echo '<p>' . $_POST['username'] . ', здравствуйте' . '</p>';
} else {
    echo '
  <p>Ошибка при авторизации, введен неверный логин или пароль</p>
  <form name="login">
    <p>Логин <input name="username" id="username" value="' . $_POST['username'] . '"><br>
    Пароль <input type="password" name="password" id="password" value=""></p>
    <input type="button" value="Вход" onClick="sendRequest();"><br>
  </form>';
}
