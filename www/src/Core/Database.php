<?php

namespace App\Core;

use Exception;

class Database
{
    private static $instance = null;

    protected function __construct()
    {
        try {
            
            self::$instance = new \PDO("mysql:host=database;dbname=mvcdocker2;port=3306","root","password");
            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            self::$instance->query('SET NAMES utf8');
            self::$instance->query('SET CHARACTER SET utf8');

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Instanciation de la class Database de manière unique
     * @static
     * @return object 
     */
    public static function getInstance() 
    {
        if(is_null(self::$instance)) {
            
            self::$instance = new Database();
        }

        return self::$instance;
    }


    /**
     * Enregistrement dynamique d'un objet en base de données
     *
     * @return void
     */
    public function save() {

        $classExploded = explode("\\", get_called_class());
		$table = end($classExploded) ;
		
        $columns = get_object_vars($this);
		$toDelete = get_class_vars(get_class());
        $data = array_diff_key($columns, $toDelete);
        unset($data['conn']);

        
        if (is_null($this->getId())) {
            
            
            $sql = " INSERT INTO $table 
			(". implode(",", array_keys($data)) .") 
			VALUES 
            (:". implode(",:", array_keys($data)) .")";
            
            $conn = self::getInstance();

			$queryPrepared = $conn->prepare($sql);

			$queryPrepared->execute($data);
			
		}else {
			//UPDATE
		}


    }

}
