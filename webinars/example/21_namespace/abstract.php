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

//Что будет?
//$a=new A();//1
$b=new B();//2
$a->Call(); //3
$b->Test(); //4
$b->Call(); //5
