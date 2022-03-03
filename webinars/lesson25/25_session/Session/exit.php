<?php
  session_start();
  $_SESSION = []; //session_unset();
  setcookie(session_name(), '');
  session_destroy();
?>
<html>
 <head>
    <title>Мой сайт</title>
  </head>
  <body>
    <h1>
      Спасибо за посещение нашего сайта!
    </h1>
        <a href="index.php">Главная страница</a><br>
  </body>
</html>
