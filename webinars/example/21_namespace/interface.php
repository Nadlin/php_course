<?php

interface int1
{
    public function func1();
}

interface int2
{
    public function func2();
}

class myclass implements int1, int2
{
    public function func1()
    {
        echo "Объект выполняет функцию 1.<br>";
    }
    public function func2()
    {
        echo "Объект выполняет функцию 2.<br>";
    }
}

$obj = new myclass;
$obj->func1();
$obj->func2();