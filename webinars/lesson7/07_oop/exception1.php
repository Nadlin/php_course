<?php
function sum($x, $y) {
    if (is_numeric($x) && is_numeric($y))
        return $x+$y;
    else
        throw new Exception('Нечисловые значения');
}
try {
    try {
        $sum = sum('xxx', 5);
        echo "Сумма равна $sum <br>";
    }
    catch(Exception $e) {
        echo 'Вложенное исключение<br>';
        throw new Exception($e->getMessage());
    }
    finally {
        echo 'Блок finally<br>';
    }
}
catch(Exception $e) {
    echo $e->getMessage();
}
