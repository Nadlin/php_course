<?php
$n = 10;
for ($i = 0; $i < $n; $i++) {
    $array[$i] = mt_rand(0, 100);
}
function printArray($array, $currentKey = -1)
{
    echo '<tr>';
    foreach ($array as $key => $value) {
        $style = '';
        if ($key == $currentKey) $style = ' style="background-color:green"';
        echo "<td$style>$value</td>";
    }
    echo '</tr>';
}

echo 'Сортировка выборкой<table>';
$sortingArray = $array;
$count = count($sortingArray);
printArray($sortingArray);
for ($currentKey = 0; $currentKey < $count-1; $currentKey++) { 
    $minKey = $currentKey;
    $minVal = $sortingArray[$currentKey];
    for ($nextKey = $minKey + 1; $nextKey < $count; $nextKey++){
        if ($sortingArray[$nextKey] < $minVal) {
            $minKey = $nextKey;
            $minVal = $sortingArray[$nextKey];
        }
    }
    if ($minVal < $sortingArray[$currentKey]) {
        $sortingArray[$minKey] = $sortingArray[$currentKey];
        $sortingArray[$currentKey] = $minVal;
    }
    printArray($sortingArray, $currentKey);
}
echo '</table>';

echo 'Пузырьковая сортировка<table>';
$sortingArray = $array;
$count = count($sortingArray);
printArray($sortingArray);
for ($currentKey = 0; $currentKey < $count-1; $currentKey++) { 
    for ($nextKey = $count - 1; $nextKey > $currentKey; $nextKey--){
        if ($sortingArray[$nextKey] < $sortingArray[$nextKey - 1]) {
            $temp = $sortingArray[$nextKey];
            $sortingArray[$nextKey] = $sortingArray[$nextKey - 1];
            $sortingArray[$nextKey - 1] = $temp;
        }
    }
    printArray($sortingArray, $currentKey);
}
echo '</table>';

echo 'Сортировка вставками<table>';
$sortingArray = $array;
$count = count($sortingArray);
printArray($sortingArray);
for ($currentKey = 1; $currentKey < $count; $currentKey++) { 
    $temp = $sortingArray[$currentKey];
    for ($nextKey = $currentKey; $nextKey > 0; $nextKey--){
        if ($sortingArray[$nextKey - 1] > $temp) {
            $sortingArray[$nextKey] = $sortingArray[$nextKey - 1];
        } else {
            break;
        }
    }
    $sortingArray[$nextKey] = $temp;
    printArray($sortingArray, $currentKey);
}
echo '</table>';
