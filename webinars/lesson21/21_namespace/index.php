<?php

//пространства имен соответствуют путям к соответствующим файлам
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class) . '.php';//Заменяем \ в пространстве имен на / получаем путь к файлу
    if (file_exists($class))
        return include_once($class);
    else
        return false;
});

try
{
    $controller = new controllers\controller;
    $controller->run();
}
catch(throwable $e)//перехват исключений и ошибок (throwable введено в php7)
{
    echo $e->getMessage(), '<br/>File: ', $e->getFile(), '<br/>Line: ', $e->getLine();
}