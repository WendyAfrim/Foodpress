<?php

namespace App\Controllers;

use App\Core\Database;
use App\Core\View;
use App\Models\User;
use App\Form\RegisterForm;

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
     */
    public function register()
    {

        $user = new User();
        $form = new RegisterForm();

        $view = new View('Security/registration', 'front-template');
        $view->form = $form->renderHtml();

        if(!empty($_POST))
        {
            $user->setFirstname(htmlentities($_POST['firstname']));
            $user->setLastname(htmlentities($_POST['lastname']));
            $user->setEmail(htmlentities($_POST['email']));
            $user->setPassword(htmlentities($_POST['password']));
            $user->setRoles("['ROLE_USER']");
            $user->setAdress(htmlentities($_POST['address']));
            $user->setZipcode(htmlentities($_POST['zipcode']));
            $user->setCity(htmlentities($_POST['city']));
            $user->setPhone(htmlentities($_POST['phone']));
            // $user->setCreatedAt(new \Datetime());

            $user->save();
        }

        
        // echo '<pre>';
        // var_dump($user);
        // echo '</pre>';
        // die;
        
    }
}
