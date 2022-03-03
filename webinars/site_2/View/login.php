<?php

if (empty(\Model\Session::getUserId())) {
    return 
    '<form name="loginform">' . 
    '<p>Логин <input type="text" name="login" value=""></p>' .
    '<p>Пароль <input type="password" name="password" value=""></p>' .
    '<p><input type="button" value="Вход" onClick="userLogin(\'' . 
     BASEURL . 'users/login' . '\')"></p></form>' .
    '<div id="loginerror" style="color:red"></div>';
} else {
    return
    '<p>' . \Model\Session::getUserLogin(). '</p>' .
    '<p><a href="' . BASEURL . 'users/logout' . 
    '"><input type="button" value="Выход"></a></p>';
}