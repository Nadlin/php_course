<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Массивы</title>
    <style>

    </style>
</head>
<body>
<!--
1. Определить произведение элементов массива, расположенных между максимальным и минимальным элементами.
-->
<?php
$arr = [8, 7, 32, 19, 17, 15, 3, 5, 1, 12, 20];
//$arr = [8, 8, 8, 8];
$max = $arr[0];
$min = $arr[0];
$max_index= 0;
$min_index= 0;
for ($i = 1; $i < count($arr); $i++) {
    if ($arr[$i] > $max) {
        $max  = $arr[$i];
        $max_index = $i;
    }

    if ($arr[$i] < $min) {
        $min  = $arr[$i];
        $min_index = $i;
    }
}
var_dump($arr);
if ($max != $min) {
    echo '</br> Минимальное число $arr[$min_index] = $min / $arr' . "[$min_index] = $min" .
         '</br> Максимальное число $arr[$max_index] = $max / $arr' . "[$max_index] = $max";
} else {
    echo 'числа в массиве одинаковые';
}





//$ind = ($max_index > $min_index) ? $max_index : $min_index;
//$bb = $max_index <=> $min_index;
/*if ($max_index > $min_index) {
    for ($j = $min_index + 1; $j < $max_index; $j++) {
        $multi *= $arr[$j];
    }
} else {
    for ($j = $max_index + 1; $j < $min_index; $j++) {
        $multi *= $arr[$j];
    }
}*/
$multi = 1;
if ($max_index > $min_index) {
    for ($j = $min_index + 1; $j < $max_index; $j++) {
        $multi *= $arr[$j];
    }
} else {
    for ($j = $min_index - 1; $j > $max_index; $j--) {
        $multi *= $arr[$j];
    }
}

/*if ($max_index > $min_index) {
    $start_index = $min_index;
    $finish_index = $max_index;
} else {
    $start_index = $max_index;
    $finish_index = $min_index;
}*/

/*$start_index = ($max_index > $min_index) ? $min_index : $max_index;
$finish_index = ($max_index > $min_index) ? $max_index : $min_index;
for ($j = $start_index + 1; $j < $finish_index; $j++) {
    $multi *= $arr[$j];
}*/
echo "</br>произведение $multi</br>";




?>

<!-- готовые функции php -->
<?php

$min = min($arr);
$max = max($arr);
echo "$min, $max";
//$cat = array_slice($arr, -1);
var_dump($arr);
//var_dump($cat);
$key_min = array_search($min, $arr);
$key_max = array_search($max, $arr);
if ($key_min < $key_max) {
    $offset = $key_min + 1;
    $length = $key_max - $offset;
} else {
    $offset = $key_max + 1;
    $length = $key_min - $offset;
}

$arr_min_max = array_slice($arr, $offset, $length);
$multi = array_product($arr_min_max);
var_dump($arr_min_max);
echo "произведение $multi";
?>

<!--
2. Преобразовать массив таким образом, чтобы в первой его половине располагались элементы,
стоявшие в исходном массиве на нечетных позициях (1, 3, 5, ...),
а во второй половине — элементы, стоявшие на четных позициях (0, 2, 4, ...)
-->
<?php
$arr = [8, 7, 12, 19, 6, 13, 17, 16, 15, 3, 5, 4, 12, 20, 0];
$arr_new = [];
/*for ($i = 0; $i < count($arr); $i++) {
    if ($i%2 == 0) {
        array_unshift($arr_new, $arr[$i]);
    } else {
        array_push($arr_new, $arr[$i]);
    }
}*/
for ($i = 0, $j = 1; $i < count($arr); $i += 2, $j += 2) {
    $arr_even[] = $arr[$i]; // четные
    if ($j < count($arr)) {
        $arr_odd[] = $arr[$j];  // нечетный
    }

    //array_unshift($arr_new, $arr[$i]);
    //array_push($arr_new, $arr[$i]);
}
var_dump($arr);
var_dump($arr_odd);
var_dump($arr_even);
$arr_unit = array_merge($arr_odd, $arr_even);
var_dump($arr_unit);
?>


<!--
3. В двумерном массиве определить номера столбцов, не содержащих ни одного нулевого элемента,
и вычислить произведения элементов каждого из этих столбцов
-->
<?php
$arr_d = [[1,3,5],
          [7,9,0],
          [9,1,2]];
$multi = 1; $multi0 = 1; $multi1 = 1; $multi2 = 1;
for ($i = 0; $i < count($arr_d); $i++) {
    for ($j = 0; $j < count($arr_d[$i]); $j++) {
       // $arr_d[$i][$j]    // $arr_d[0][0], $arr_d[1][0], $arr_d[2][0] - 1-й столбец
                            // $arr_d[0][1], $arr_d[1][1], $arr_d[2][1] - 2-й столбец
                            // $arr_d[0][3], $arr_d[1][3], $arr_d[2][3] - 3-й столбец

        if ($arr_d[$j][$i] != 0) { //$arr_d[0][0], $arr_d[1][0], $arr_d[2][0]
            ${"multi$i"} *= $arr_d[$j][$i];
        } else {
            ${"multi$i"} = null;
            break;
        }
    }

}
echo "$multi0, $multi1, $multi2";
//echo "$arr_d[0][0]";
var_dump($arr_d);
var_dump($arr_d[0][0]);
$tt = $arr_d[0][0];

$tt *= $arr_d[1][0];
$tt *= $arr_d[2][0];
echo "$tt";
?>
</body>
</html>
