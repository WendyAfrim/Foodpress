<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;
use App\Form\RegisterForm;
use App\Core\FormVerification;
use App\Core\Mailer;

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
        $config = $form->createForm();

        $date = new \Datetime;
        $date = $date->format('Y-m-d H:i:s');

        if (!empty($_POST)) {
            $errors =  FormVerification::check($_POST, $config);

            if (empty($errors)) {

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

                $dirname = dirname(__DIR__, 1);
                $path = $dirname . '/Views/Mails/registration_confirmation.php';

                Mailer::sendEmail($path, $_POST['email'], 'Confirmation de votre inscription');

                # Redirection vers une vue informant l'utilisateur qu'il va recevoir un email de confirmation
            }
        }

        $view = new View('Security/registration', 'front-template');
        $view->form = $form->renderHtml();
        $view->title = "Nouvel inscription";
    }
}
