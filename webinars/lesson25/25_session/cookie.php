<?php
// Cookie на одну сессию, т. е. до закрытия браузера.
//setcookie("mycookie", "cookie на одну сессию");

// Эти cookies уничтожаются браузером через 1 час после установки
//setcookie("other", "cookie на один час", time()+3600);
var_dump($_COOKIE);
