<?php

require 'config.php';

spl_autoload_register(
    function ($class) {
        $file = $class . '.php';
        if (is_readable($file))
        {
            include $file;
            return true;
        }
        else
            return false;
    }
);

$controller = new Controller();
$controller->run();
