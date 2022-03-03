<?php
$n = 50;
for ($i = 0; $i < $n; $i++) {
    $array[$i] = mt_rand(0, 100);
}
function printArray($array, $color, $leftKey = 0, $rightKey = PHP_INT_MAX)
{
    echo '<tr>';
    foreach ($array as $key => $value) {
        $style = '';
        if ($key >= $leftKey && $key <= $rightKey) 
            $style = " style='background-color:$color'";
        echo "<td$style>$value</td>";
    }
    echo '</tr>';
}

function quickSort(&$sortingArray, $left, $right)
{
    printArray($sortingArray, 'yellow', $left, $right);
    $i = $left;
    $j = $right;
    $value = $sortingArray[($left + $right) / 2];
    do {
        while ($sortingArray[$i] < $value) $i++;
        while ($sortingArray[$j] > $value) $j--;
        if ($i <= $j) {
            $temp = $sortingArray[$i];
            $sortingArray[$i] = $sortingArray[$j];
            $sortingArray[$j] = $temp;
            $i++; $j--;
        }
    } while ($i <= $j);
    if ($left < $j) quickSort ($sortingArray, $left, $j);
    if ($i < $right) quickSort ($sortingArray, $i, $right);
    printArray($sortingArray, 'green', $left, $right);
}
echo 'Быстрая сортировка<table>';
$sortingArray = $array;
$count = count($sortingArray);
quickSort ($sortingArray, 0, $count -1);
