<?php
$x = [3, 5, 6, 10, 1];
$max = $x[0];
for ($i = 1; $i < 5; $i++) {
    if ($x[$i] > $max) {
        echo $x[$i], '<br>';
        $max = $x[$i];
    }
}
echo $max;