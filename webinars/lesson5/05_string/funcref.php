<?php
//возвращение ссылки
function &ref()
{
    $a = 5;
    $b = 3;
    if ($a>$b) return $a;
    else return $b;
}
$c = &ref();
echo $c;  // Выводит 5

