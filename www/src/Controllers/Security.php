<?php

namespace App\Controllers;

use App\Core\Database;
use App\Core\View;

class Security
{

    public function login()
    {

        $view = new View('Security/login', 'front-template');
    }

    public function register()
    {

        $instance = Database::getInstance();
        $conn = $instance->getConnection();

        
		$classExploded = explode("\\", get_called_class());
		$table = end($classExploded) ;

		$columns = get_object_vars($this);
		$toDelete = get_class_vars(get_class());
		$data = array_diff_key($columns, $toDelete);


    }
}
