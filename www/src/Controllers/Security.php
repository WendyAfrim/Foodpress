<?php

namespace App\Controllers;

use App\Core\Database;
use App\Core\View;
use App\Models\User;

class Security
{

    public function login()
    {

        $view = new View('Security/login', 'front-template');
    }


    /**
     * Page d'inscription des clients qui utiliseront le site généré par le restaurateur
     * A partir de notre CMS
     * 
     * @return void 
     */
    public function register()
    {

        $user = new User();
        
        $user->setFirstname("Wendy");
        $user->setLastname('AFRIM');
        $user->setLastname('wendy.afrim2@gmail.com');
        $user->setPassword('12344');
        $user->setRoles("['ROLE_USER']");
        $user->setAdress('3 Cours Sainte Marthe');
        $user->setZipcode('94320');
        $user->setCity('Thiais');
        $user->setPhone('33650025841');
        $user->setPayment('CB');
        // echo '<pre>';
        // var_dump($user);
        // echo '</pre>';
        // die;

        $user->save();
        
    }
}
