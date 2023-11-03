<?php

namespace database;
use PDO;
use PDOException;


class DbConnection {

    private static $instance = NULL;

    public static function getDbInstance() {

        if (!isset(self::$instance)) {
            try {
                var_dump(getenv("DB_HOST"));
                self::$instance = new PDO("mysql:host=localhost;dbname=coltek;", "root", "");
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $ex) {
                $ex->getMessage();
            }
        }
        
        return self::$instance;
    }

}
