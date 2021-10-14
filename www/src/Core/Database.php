<?php

namespace App\Core;

use Exception;
use PDO;

require 'vendor/autoload.php';

class Database
{
    private static $instance = null;

    public static function getPdo(): PDO
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
        $dotenv->load();

        if (self::$instance === null) {

            self::$instance = new PDO("mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_NAME'].";port=".$_ENV['DB_PORT']."", "".$_ENV['DB_USER']."", "".$_ENV['DB_PASSWORD']."", [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
            ]);
        }

        return self::$instance;
    }
}
