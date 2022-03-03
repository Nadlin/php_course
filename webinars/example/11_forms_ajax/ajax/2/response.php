<?php
  //указываем формат и кодировку отправляемых данных
  header("Content-type: text/plain; charset=utf-8");
	if (isset($_GET['ajaxdata'])) 
  {
	  $ajaxdata=$_GET['ajaxdata'];
	  echo "Введенный текст: ".htmlspecialchars($ajaxdata, ENT_QUOTES, 'UTF-8');
	}
  else
  {
    echo "Данные не найдены"; 
  }
?>