<?php
  session_start();
?>    
<html>
 <head>
    <title>Пример сессии</title>
  </head>
  <body>
    <h1>
      Главная страница
    </h1>
    <?php

    if (isset($_SESSION['name'])) {
        echo 'Пользователь '.$_SESSION['name'].'<br><a href="exit.php">Выход</a><br>';
    } else {
        echo 'Незарегистрированный пользователь<br><a href="enter.php">Вход</a><br>';
    }

    if (!isset($_SESSION['count'])) $_SESSION['count'] = 0;
    $_SESSION['count'] = $_SESSION['count'] + 1;
    echo 'Счетчик переходов: '.$_SESSION['count'];
    ?>
    <h2>Содержимое нашей главной страницы</h2>
    <a href="index.php">Главная страница</a><br />
    <a href="page2.php">Страница2</a>
  </body>
</html>
