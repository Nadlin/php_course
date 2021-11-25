<!--
Задание 1. Напишите скрипт, которой для числа $x выводит его значение разным цветом
зеленым – если $x положительно
желтым – если $x равно 0
красным – если $x отрицательно
-->
<!DOCTYPE html>
<html>
<head>
    <style>
        p {
            font-size: 20px;
            font-weight: bold;
        }

        .green {
            color: green;
        }

        .yellow {
            color: yellow;
        }

        .red {
            color: red;
        }
    </style>
</head>
<body>
<!-- 1.1 -->
<?php
$x = -9;
if ($x > 0) {
    echo "<p style=\"color: green\">$x</p>";
} else if ($x == 0) {
    echo "<p style=\"color: yellow\">$x</p>";
} else {
    echo "<p style=\"color: red\">$x</p>";
}

?>

<!-- 1.2 -->

<p>Переменная $x = <span class="
    <?php if ($x > 0) {
        echo 'green';
    }  elseif ($x == 0) {
        echo 'yellow';
    } else {
        echo 'red';
    }?>"><?= $x ?></span></p>


<!-- 1.3 -->
<?php
if ($x > 0) {
    $color = 'green';
} else if ($x == 0) {
    $color = 'yellow';;
} else {
    $color = 'red';
}
?>

<p>Переменная $x = <span class="<?= $color; ?>"><?= $x; ?></span></p>

<!--
Задание 2. Напишите скрипт, определяющий сумму максимального и минимального из трех чисел $a, $b, $c.
-->
<?php
$a = 3;
$b = 5;
$c = 1;

    if ($a > $b) {
        $min = ($c < $b) ? $c : $b;

        if ($a > $c) {
            $max = $a;

        } else {
            $max = ($c > $b) ? $c : $b;
        }

    } else if ($b > $a) {
        $min = ($c < $a) ? $c : $a;

        if ($b > $c) {
            $max = $b;
        } else {
            $max = ($c > $a) ? $c : $a;
        }
    }

    $sum = $max + $min;

    echo '$a = 3; $b = 5; $c = 1; ' . "sum = $sum";

    $max1 = ($a > $b) ? $a : $b;
    $max = ($max1 > $c) ? $max1 : $c;
    $min1 = ($a > $b) ? $b : $a;
    $min = ($min1 > $c) ? $c : $min1;
    $sum = $min + $max;


?>

<!--
Задание 3. Напишите скрипт, определяющий максимальное из четырех чисел $a, $b, $c, $d.
-->
<?php
$a = 3;
$b = 5;
$c = 1;
$d = 20;

    if ($a > $b) {
        if ($a > $c) {
            if ($a > $d) {
                $max = $a;
            }
        } else {
            if ($c > $b) {
                if ($c > $d) {
                    $max = $c;
                }
            } else {
                if ($b > $d) {
                    $max = $b;
                }
            }
        }
    } else {
        if ($b > $c) {
            if ($b > $d) {
                $max = $b;
            }
        } else {
            if ($c > $a) {
                if ($c > $d) {
                    $max = $c;
                }
            }
        }
    }
?>


<?php
$a = 389;
$b = 500;
$c = 12;
$d = 20;
    $max1 = ($a > $b) ? $a : $b;
    $max2 = ($c > $d) ? $c : $d;
    $max = ($max1 > $max2) ? $max1 : $max2;
    echo "</br> максимальное из четырех чисел $a, $b, $c, $d это $max";
?>

<!--
Задание 4. Известны длина и ширина сумки $a, $b, а также длина и ширина товара $c, $d.
Напишите скрипт, определяющий, можно ли товар упаковать в сумку.
Предусмотреть возможность ввода длины и ширины в произвольном порядке, например, 20, 30 или 30, 20.
Усложнение задачи: добавьте еще высоту сумки и высоту товара. Учтите, что товар можно повернуть.
-->
<?php
$a = 200;
$b = 50;
$c = 40;
$d = 190;
    if (($c < $a && $d < $b) || ($c < $b && $d < $a)) {
        echo "<br/>товар $c на $d можно упаковать в сумку $a на $b";
    } else {
        echo "<br/>товар $c на $d нельзя упаковать в сумку $a на $b";
    }
?>

<?php
$bag_length = 200;
$bag_width = 50;
$bag_height = 40;
$product_length = 40;
$product_width = 190;
$product_height = 30;

$product_length = 35;
$product_width = 190;
$product_height = 40;
if (($product_length < $bag_length && $product_width < $bag_width && $product_height < $bag_height) ||
    ($product_length < $bag_width && $product_width < $bag_length && $product_height < $bag_height) ||
    ($product_length < $bag_length && $product_width < $bag_height && $product_height < $bag_width) ||
    ($product_length < $bag_height && $product_width < $bag_length && $product_height < $bag_width)) {
    echo "<br/>товар $product_length на $product_width на $product_height можно упаковать в сумку $bag_length на $bag_width на $bag_height";
} else {
    echo "<br/>товар $product_length на $product_width на $product_height нельзя упаковать в сумку $bag_length на $bag_width на $bag_height";
}
?>




