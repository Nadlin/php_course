<?php
try
{
    $x=2;
    if (!$x) throw new Exception ("x содержит ошибочное значение");
    // Дальнейшие действия выполняются, когда ошибок нет
    echo 5/$x;
}
catch (Exception $e)
{
    echo 'Ошибка в строке '.$e->getLine().':<br>';
    echo $e->getMessage();
}