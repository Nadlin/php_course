<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Массивы</title>
    <style>
        .bg {
            background: yellow;
        }
    </style>
</head>
<body>

<!--
1. Определить произведение элементов массива, расположенных между максимальным и минимальным элементами.
-->
<!-- 1.1 -->
<h3 class="bg">Task 1</h3>
<?php
$arr = [8, 7, 32, 19, 17, 15, 3, 5, 1, 12, 20];
//$arr = [8, 8, 8, 8];
$max = $arr[0];
$min = $arr[0];
$max_index= 0;
$min_index= 0;
var_dump($arr);
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

if ($max != $min) {
    $multi = 1;

    // 1-й вариант нахождения произведения
    /*if ($max_index > $min_index) {
        for ($j = $min_index + 1; $j < $max_index; $j++) {
            $multi *= $arr[$j];
        }
    } else {
        for ($j = $min_index - 1; $j > $max_index; $j--) {
            $multi *= $arr[$j];
        }
    }*/

    // 2-й вариант нахождения произведения
    $start_index = ($max_index > $min_index) ? $min_index : $max_index;
    $finish_index = ($max_index > $min_index) ? $max_index : $min_index;
    for ($j = $start_index + 1; $j < $finish_index; $j++) {
        $multi *= $arr[$j];
    }


    echo '</br> Минимальное число $arr[$min_index] = $min / $arr' . "[$min_index] = $min" .
         '</br> Максимальное число $arr[$max_index] = $max / $arr' . "[$max_index] = $max" .
         "</br>Произведение элементов массива, расположенных между максимальным и минимальным элементами:  $multi</br>";
} else {
    echo 'числа в массиве одинаковые';
}
?>

<!-- 1.2 PHP Functions -->
<?php
$min = min($arr);
$max = max($arr);
var_dump($arr);
echo "$min, $max";
$key_min = array_search($min, $arr); // находим ключ для минимального значения
$key_max = array_search($max, $arr); // находим ключ для максимального значения
if ($key_min < $key_max) {
    $offset = $key_min + 1;
    $length = $key_max - $offset;
} else {
    $offset = $key_max + 1;
    $length = $key_min - $offset;
}

$arr_min_max = array_slice($arr, $offset, $length); // получаем массив элементов между максимальным и минимальным значениями
$multi = array_product($arr_min_max); // получаем произведение элементов массива
var_dump($arr_min_max);
echo "Произведение $multi";
?>

<!--
2. Преобразовать массив таким образом, чтобы в первой его половине располагались элементы,
стоявшие в исходном массиве на нечетных позициях (1, 3, 5, ...),
а во второй половине — элементы, стоявшие на четных позициях (0, 2, 4, ...)
-->
<hr>
<h3 class="bg">Task 2</h3>
<?php
$arr = [8, 7, 12, 19, 6, 13, 17, 16, 15, 3, 5, 4, 12, 20, 0];

for ($i = 0, $j = 1; $i < count($arr); $i += 2, $j += 2) {
    $arr_even[] = $arr[$i];         // четные
    if ($j < count($arr)) {
        $arr_odd[] = $arr[$j];      // нечетный
    }
}
var_dump($arr);
var_dump($arr_odd);  // массив из элементов, которые были на нечетных позициях в исходном массиве
var_dump($arr_even); // массив из элементов, которые были на четных позициях в исходном массиве
$arr_unit = array_merge($arr_odd, $arr_even); // объединяем два массива в один
var_dump($arr_unit);
?>


<!--
3. В двумерном массиве определить номера столбцов, не содержащих ни одного нулевого элемента,
и вычислить произведения элементов каждого из этих столбцов
-->
<hr>
<h3 class="bg">Task 3</h3>

<?php
$arr_d = [[1,3,5],
          [7,9,0],
          [9,1,2]];
$multi0 = 1; $multi1 = 1; $multi2 = 1; $arr_new = [];

for ($i = 0, $k = 1; $i < count($arr_d); $i++, $k++) { // k - номер столбца
    for ($j = 0; $j < count($arr_d[$i]); $j++) {
       // $arr_d[$j][$i]    // $arr_d[0][0], $arr_d[1][0], $arr_d[2][0] - 1-й столбец / k = 1
                            // $arr_d[0][1], $arr_d[1][1], $arr_d[2][1] - 2-й столбец / k = 2
                            // $arr_d[0][3], $arr_d[1][3], $arr_d[2][3] - 3-й столбец / k = 3

        if ($arr_d[$j][$i] != 0) {
            ${"multi$i"} *= $arr_d[$j][$i];
            $arr_new[$k] = ${"multi$i"};
        } else {
            if (array_key_exists($k, $arr_new)) {
                unset($arr_new[$k]);
            }
            break;
        }
    }
}

var_dump($arr_d);
var_dump($arr_new);
echo 'номера столбцов, не содержащих нулевое значение и произведения их элементов: </br> столбец / произведение </br>';
foreach ($arr_new as $key => $value) {
    echo "$key / $value </br>";
}

?>
</body>
</html>
