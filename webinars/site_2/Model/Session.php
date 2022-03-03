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
        if (empty(self::getUserId())) {
            self::setUnknown();
            return;
        }
        $user = \Model\Users::getUser(self::getUserId());
        if ($user) {
            self::setUserLogin($user['login']);
            self::getUserRole($user['role']);
        } else {
            self::setUnknown();
        }
    }
    
    private static function setUnknown()
    {
        self::setUserId(0);
        self::setUserLogin('');
        self::setUserRole('');
    }
    
    public static function exit()
    {
        setcookie(session_name(), '');
        session_unset();
        session_destroy();
    }
    
    public static function setUserId($id)
    {
        $_SESSION['UserId'] = $id;
    }
    
    public static function getUserId()
    {
        return $_SESSION['UserId']??0;
    }
    
    public static function setUserLogin($name)
    {
        $_SESSION['UserLogin'] = $name;
    }
    
    public static function getUserLogin()
    {
        return $_SESSION['UserLogin']??'';
    }
    
    public static function setUserRole($role)
    {
        $_SESSION['UserRole'] = $role;
    }
    
    public static function getUserRole()
    {
        return $_SESSION['UserRole']??'';
    }
}
