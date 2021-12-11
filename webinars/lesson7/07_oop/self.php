<?php
class MyClass
{
    private static $x;
    public static function f1()
    {
        self::$x = 5;
        return self::class;
    }
    public static function f2()
    {
        self::$x += 10;
        return self::class;
    }
    public static function getX()
    {
        return self::$x;
    }
}
echo MyClass::f1()::f2()::getX();
