<?php

namespace App\Core;

use Exception;
use PDO;

class Database
{
    private static $instance = null;

    public static function getPdo(): PDO
    {
        if (self::$instance === null) {

            self::$instance = new PDO("mysql:host=database;dbname=mvcdocker2;port=3306", "root", "password", [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }

        return self::$instance;
    }
}
