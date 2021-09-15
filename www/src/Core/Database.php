<?php

namespace App\Core;

use Exception;

class Database
{
    protected static $instance = null;

    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = 'root';
    protected $dbname = 'foodpress';
    protected $port = '3306';

    public function __construct()
    {
        $this->conn = new \PDO("mysql:host=database;dbname=mvcdocker2;port=3306","root","password");

        // $this->conn = new \PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';port='.$this->port,$this->user, $this->password);

        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        try {

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function getInstance() 
    {
        if(is_null(self::$instance)) {
            
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection() 
    {
        return $this->conn;
    }

}
