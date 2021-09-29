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

    /**
     * Enregistrement dynamique d'un objet en base de données
     *
     * @return void
     */
    public function save()
    {

        $classExploded = explode("\\", get_called_class());
        $table = end($classExploded);

        $columns = get_object_vars($this);
        $toDelete = get_class_vars(get_class());
        $data = array_diff_key($columns, $toDelete);
        unset($data['conn']);


        if (is_null($this->getId())) {


            $sql = " INSERT INTO $table 
			(" . implode(",", array_keys($data)) . ") 
			VALUES 
            (:" . implode(",:", array_keys($data)) . ")";

            $conn = self::getInstance();

            $queryPrepared = $conn->prepare($sql);

            $queryPrepared->execute($data);
        } else {
            //UPDATE
        }
    }
}
