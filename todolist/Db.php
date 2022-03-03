<?php

class Db {
    private static $mysqli;
    
    public static function init($host, $username, $password, $dbname) {
        if (!self::$mysqli) {
            self::$mysqli = new mysqli($host, $username, $password, $dbname);
        }
    }
    
    public static function select($sql, $parameters = null) {

        if (!($result = self::$mysqli->query($sql))) {
            throw new Exception(self::$mysqli->error);
        }

        return  $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function create($sql) {
        if (!($result = self::$mysqli->query($sql))) {
            throw new Exception(self::$mysqli->error);
        }
        return self::$mysqli->insert_id;
    }

    public static function execute($sql) {
        if (!($result = self::$mysqli->query($sql))) {
            throw new Exception(self::$mysqli->error);
        }
    }
}
