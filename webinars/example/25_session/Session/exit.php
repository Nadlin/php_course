<?php
  session_start();
  session_destroy();
//  session_unset();
//  setcookie(session_name(), '');
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
