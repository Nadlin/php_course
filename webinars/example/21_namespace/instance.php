<?php

abstract class A
{
    abstract function Test();//Виртуальная функция

    function Call()
    {
        $this->Test();
    }
}

class B extends A
{
// Функция Test() для класса B
    function Test()
    {
        echo "Test from B\n";
    }
}

$b=new B();
if ($b instanceof B)
{
    echo 'Это объект класса B';
}
if ($b instanceof A)
{
    echo 'Это объект класса A';
}
