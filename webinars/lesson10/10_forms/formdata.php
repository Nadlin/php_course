<!DOCTYPE html>
<html>
<head>
    <title>Работа с формой</title>
</head>
<body>
<h1>
    Полученные из формы данные
</h1>
<?php
echo 'Страница ссылки: ' . $_SERVER["HTTP_REFERER"] . '<br>';
$method = $_SERVER["REQUEST_METHOD"];
echo 'Метод запроса: ' . $method . '<br>';
echo 'Строка данных запроса: '.$_SERVER["QUERY_STRING"].'<br><br>';
if ($method == 'GET')
    $data = $_GET;
else
    $data = $_POST;
echo "Значения в переменной \$_$method<br>";
foreach ($data as $par => $val)
{
    if (is_array($val)) {
        echo "$par = [<br>" . implode('<br>', $val) . '<br>]<br>';
    } else
        echo $par.' = '.$val.'<br>';
}
?>
</body>
</html>
