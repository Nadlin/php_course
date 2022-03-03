<?php
  session_start();
  if (isset($_SESSION['name'])) //Проверка повторного входа
  {
    echo '<html>
      <head><title>Мой сайт</title></head>
      <body>Вы вошли под именем '.htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8').
        '<br><a href="index.php">OK</a><br>
      </body></html>';
    exit();
  }
  if (!empty($_POST["regname"])) //Если из формы получено не пустое имя
  {
      $_SESSION['name']=$_POST["regname"];
      $_SESSION['count']=0;
      $URL = 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']).'/index.php';
      Header('Location: '.$URL); //редирект на index.php
      exit();
  }
  else
  {
    $ErrorMessage = 'Необходимо ввести свое имя<br>';
  }
?>
<html>
  <head>
    <title>Вход</title>
  </head>
  <body>
    <h1>
      Страница входа
    </h1>
<?php
  if (!empty($ErrorMessage)) echo $ErrorMessage;// если есть ошибки, выводим сообщение об ошибках
?>
    <form action="enter.php" method="post">
      Ваше имя (не более 30 символов)<br>
      <input type="text" name="regname" size="30" maxlength="30" value=""><br>
      <input type="submit" value="Отправить">
    </form>
  </body>
</html>
