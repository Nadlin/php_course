<?php
namespace Model;

class Session {
    private static $isInit = false;

    private function __construct() {

    }

    public static function init()
    {
        if (self::$isInit) return;
        self::$isInit = true;
        session_start();
    }

    public static function getUserId()
    {
        return $_SESSION['userId'] ?? 0;
    }

    public static function setUserId($id)
    {
        $_SESSION['userId'] = $id;
    }

    public static function getUserEmail()
    {
        return $_SESSION['userEmail'] ?? 0;
    }

    public static function setUserEmail($email)
    {
        $_SESSION['userEmail'] = $email;
    }

    public static function exit()
    {
        session_unset();
        session_destroy();
        header("Location: /main");
    }
}