<?php

namespace App\Core;

use Exception;

class Database
{
    protected static $instance = null;

    protected $host = 'database';
    protected $user = 'root';
    protected $pwd = 'password';
    protected $dbname = 'mvcdocker2';
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
     * Retourne un objet PDO
     *
     * @return object
     */
    public function getConnection() 
    {
        return $this->conn;
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
            
			$queryPrepared = $this->conn->prepare($sql);

			$queryPrepared->execute( $data );
			
		}else {
			//UPDATE
		}


    }

}
