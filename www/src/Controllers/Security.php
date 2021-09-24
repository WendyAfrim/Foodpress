<?php

namespace App\Controllers;

if(!isset($_SESSION)){
    session_start();
}

use App\Core\Database;
use App\Core\View;
use App\Models\User;
use App\Form\RegisterForm;
use App\Core\FormVerification;

class Security
{

    public function login()
    {
        $form = new LoginForm();
        if (!empty($_POST)) {
            $errors =  FormVerification::check($_POST, $form->getFormConfig());
            //LANCEMENT DE SESSION
            if (empty($errors)) {
                $user = new User();
                $user->findByCriteria();
            }
        }
        $view = new View('Security/login', 'front-template');
    }


    /**
     * Page d'inscription des clients qui utiliseront le site généré par le restaurateur
     * A partir de notre CMS
     * 
     */
    public function register()
    {
        $form = new RegisterForm();
        if (!empty($_POST)) {
            $errors =  FormVerification::check($_POST, $form->getFormConfig());

            if (empty($errors)) {
                $user = new User();
                $date =(new \DateTime)->format('Y-m-d H:i:s');
                $user->setFirstname(htmlentities($_POST['firstname']));
                $user->setLastname(htmlentities($_POST['lastname']));
                $user->setEmail(htmlentities($_POST['email']));
                $user->setPassword(htmlentities($_POST['password']));
                $user->setRoles("['ROLE_USER']");
                $user->setAdress(htmlentities($_POST['address']));
                $user->setZipcode(htmlentities($_POST['zipcode']));
                $user->setCity(htmlentities($_POST['city']));
                $user->setPhone(htmlentities($_POST['phone']));
                $user->setCreatedAt($date);

                $user->save();
            }
        }
        $view = new View('Security/registration', 'front-template');
        $view->form = $form->renderHtml();
        $view->errors = $errors ?? [];
    }
}
