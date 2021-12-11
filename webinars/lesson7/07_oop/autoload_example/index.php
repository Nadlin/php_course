<?php
function autoload1($class) 
{
    $file = 'autoload1/' . $class . '.php';//имя файла класса в папке autoload1
    if (is_readable($file))//проверяем, если этот файл существует и доступен для чтения
    {
        include $file;//то включаем этот файл
        return true;//должно быть все OK
    }
    else
        return false;//файл недоступен, будет использована следующая функция в очереди автозагрузки
}

function autoload2($class) 
{
    $file = 'autoload2/' . $class . '.php';//имя файла класса в папке autoload2
    if (is_readable($file))//проверяем, если этот файл существует и доступен для чтения
    {
        include $file;//то включаем этот файл
        return true;//должно быть все OK
    }
    else
        return false;//файл недоступен, будет использована следующая функция в очереди автозагрузки
}

spl_autoload_register('autoload1');
spl_autoload_register('autoload2');

$class1 = new Class1();
$class1->show();
$class2 = new Class2();
$class2->show();