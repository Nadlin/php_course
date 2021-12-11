<?php
function checkInt($s)
{
    if (!is_numeric($s)) return false;
    if (intval($s) != $s) return false;
    return true;
}
if (!isset($_GET['p1'])) {
    $ref = 'filter.php?p1=-5&p2=5&p3=1000&p4=5%20&p5=%205&p6=5a&p7=3.7&p8=xxx&p9=';
    echo "<a href=\"$ref\">Тест</a>";
} else {
    var_dump($_GET);
    for ($i = 0; $i <= 9; $i++) {
        $p = 'p' . $i;
        var_dump($_GET[$p], checkInt($_GET[$p]));
        echo '---<br>';
    }
    echo '==========';
    for ($i = 0; $i <= 9; $i++) {
        $p = 'p' . $i;
        var_dump($_GET[$p], filter_input(INPUT_GET, $p, FILTER_VALIDATE_INT));
        echo '---<br>';
    }
    echo '==========';
    for ($i = 0; $i <= 9; $i++) {
        $p = 'p' . $i;
        $options = ['options' => ['default' => 1, 'min_range' => 1, 'max_range' => 100]];
        var_dump($_GET[$p], filter_input(INPUT_GET, $p, FILTER_VALIDATE_INT, $options));
        echo '---<br>';
    }
}
