<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Работаем с AJAX</title>
    <script src="jquery-3.5.0.min.js"></script><!--подключаем Jquery-->
    <script>
      function loadResult()
      {
        let data = document.getElementById("ajaxdata").value;
        $("#result").load("response.php","ajaxdata=" + encodeURIComponent(data));
      }
    </script>
  </head>
  <body>
    <h1>
      ПРИМЕР РАБОТЫ С AJAX
    </h1>
      <p>Введите отправляемые на сервер данные по технологии AJAX</p>
      <p><input name="ajaxdata" type="text" value="" id="ajaxdata" size="100" maxlength="100" onChange="loadResult();" /></p>
      <!--или альтернативный вариант по нажатию кнопки-->
      <p><input type="button" value="Отправить" id="button" onClick="loadResult();" /></p>
    <h2>А здесь будет выведен ответ сервера</h2>
    <div id="result">?</div>
  </body>
</html>