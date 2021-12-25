<?php
/*$t = microtime(true);
if ($f=fopen('C:/PHP/README.md','r'))
{
    while (!feof($f))
    {
        $text=fgets($f);//читаем построчно
        echo $text.'<br/>';
    }
    fclose($f);
}
$t = microtime(true) - $t;
echo '<br/>Время  чтения: '.$t;
*/

$t = microtime(true);
if ($f=fopen('C:/PHP/README.md','r'))
{
  while (!feof($f))
  {
    $text=fread($f, 1024);//читаем поблочно по 1 Кб
    echo $text;
  }
  fclose($f);
}
$t = microtime(true) - $t;
echo '<br/>Время  чтения: '.$t;

