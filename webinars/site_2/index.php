<?php
require 'config.php';

spl_autoload_register(function ($class) {
    $file = str_replace("\\", "/", $class) . '.php';
    if (is_readable($file)) {
        return include $file;
    }
    return false;
});

ob_start();
try {
    \Core\Db::init(DSN, LOGIN, PASSWORD);
    \Model\Session::init();
    $controller = new Controller\MainController(DEFAULTPAGE, BASEURL);
    $controller->run();
    ob_flush();
} catch (Throwable $t) {
    ob_clean();
    echo "Ошибка " . $t->getMessage();
}