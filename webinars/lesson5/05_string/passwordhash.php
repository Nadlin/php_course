<?php
$password = 'admin';
$algos = password_algos();
foreach ($algos as $algo) {
    echo $algo . ": " . password_hash($password, $algo) . "<br>";
}
