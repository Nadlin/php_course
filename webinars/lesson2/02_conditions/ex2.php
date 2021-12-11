<?php
$a = 1; $b = 2; $c = 3;
$d = ++$a + $b++ + ++$c + $a++ + ++$b + $c++;
echo $a, '<br>';
echo $b, '<br>';
echo $c, '<br>';
echo $d, '<br>';
