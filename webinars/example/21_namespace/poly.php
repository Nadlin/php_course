<?php
class A {
    function Test() { echo "Test from A"; }
    function Call() { $this->Test(); }
}

class B extends A {
    // Функция Test() для класса B
    function Test() { echo "Test from B"; }
}

$a=new A();
$b=new B();
//Что выведется в этих вызовах?
$a->Call();
$b->Test();
$b->Call();
