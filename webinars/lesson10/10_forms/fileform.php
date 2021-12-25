<!DOCTYPE html>
<html>
<head>
    <title>Загрузка файла</title>
</head>
<body>
<h1>
    Загрузка файла
</h1>
<form enctype="multipart/form-data" action="getfile.php" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="65535">
    Имя загружаемого файла: <input type="file" name="loadfile"><br>
  <input type="submit" name="sendfile" value="Отправить файл">
</form>
</body>
</html>