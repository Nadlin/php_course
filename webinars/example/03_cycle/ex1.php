<?php
$n = 10;
$i = 1; 
for (;;) {
    if ($i > $n) break;
    $k = $i * $i;
    echo $k.'<br/>';
    $i++;
}
 
//{
//    printf('Переменная  i = %2$02X, переменная j = %1$02X<br>', $j, $i);
//}
for ($i = 0, $j = 255; $i < $j; printf('Переменная  i = %2$02X, переменная j = %1$02X<br>', $j, $i), $i++, $j--);