<?php
$n = 10;
$s = 0;
for ($i = 1; $i <= $n; $i++) {
    $s = $s + $i;// или $s +=$i
    //echo $s;
}
echo $s;
echo "<br>-------------------<br>";


$x = 0;
$n = 10000;
$dx = 1 / $n;
for ($i = 1; $i <= $n; $i++) {
    $x += $dx;
}
echo "x = $x<br>";
echo "x - 1 = " . ($x - 1);