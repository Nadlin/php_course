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


\Model\Session::init();
$controller = new Controller();
$controller->run();
