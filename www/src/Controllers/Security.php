<?php 

namespace App\Controllers;

use App\Core\View;

class Security {

    public function login() {

        $view = new View('Security/login', 'front-template');
    }
}