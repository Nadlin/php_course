<?php

$array1 = [1, 2, 3, 4, 5];
$array2 = $array1;
$array3 = $array1;

function sqr(&$x)
{
    $x = $x * $x;
}
array_walk($array1, 'sqr');
var_dump($array1);

array_walk($array2, function(&$x) {$x = $x*$x;});
var_dump($array2);

$sqr = function (&$x)
{
    $x = $x * $x;
};
array_walk($array3, $sqr);
var_dump($array3);