<?php

namespace database;
use PDO;
use PDOException;

define("DB_HOST","localhost");
define("DB_NAME","coletek");
define("DB_USER","root");
define("DB_PASSWORD","");


class DbConnection {
    private static $instance = NULL;

    public static function getDbInstance() {
        
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";", DB_USER, DB_PASSWORD);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $ex) {
                $ex->getMessage();
            }
        }
        
        return self::$instance;
    }

}
