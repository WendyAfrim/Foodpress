<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Core\View;
use App\Models\User;
use App\Form\RegisterForm;
use App\Form\LoginForm;
use App\Core\FormVerification;
use App\Core\Mailer;

class SecurityController
{

    public function loginAdmin()
    {
        $form = new LoginForm;


        $view = new View('Security/loginAdmin', 'raw-template');
        $view->errors = $errors ?? [];
        $view->form = $form->renderHtml();
        $view->title = 'Foodpress | Login Admin';
    }

    public function login()
    {
        if (Auth::check()) header('Location: /');
        $form = new LoginForm();
        if (!empty($_POST)) {
            $errors =  FormVerification::check($_POST, $form->getFormConfig());
            if (empty($errors)) {
                $user = (new User())->findByOne(["email" => $_POST["email"]]);
                if ($user) {
                    if (password_verify($_POST["password"], $user->getPassword())) {
                        session_start();
                        $_SESSION['auth'] = $user->getId();
                        header('Location: /');
                    } else {
                        $errors[] = "Combinaison email/mot de passe incorrecte";
                    }
                } else {
                    $errors[] = "Combinaison email/mot de passe incorrecte";
                }
            }
        }
        $view = new View('Security/login', 'front-template');
        $view->errors = $errors ?? [];
        $view->form = $form->renderHtml();
        $view->title = "Foodpress | Connexion";
    }

    public function admin_login()
    {
        if (Auth::check()) header('Location: /');
        $form = new LoginForm();
        if (!empty($_POST)) {
            $errors =  FormVerification::check($_POST, $form->getFormConfig());
            if (empty($errors)) {
                $user = (new User())->findByOne(["email" => $_POST["email"]]);
                if ($user) {
                    if (password_verify($_POST["password"], $user->getPassword())) {
                        if ($user->getRole() == 'admin') {
                            session_start();
                            $_SESSION['auth'] = $user->getId();
                            header('Location: /admin');
                        } else {
                            $errors[] = "Vous n'avez pas les droits requis pour accéder au panel d'administration. Connectez-vous <a href='/login'>depuis ce lien</a>.";
                        }
                    } else {
                        $errors[] = "Combinaison email/mot de passe incorrecte";
                    }
                } else {
                    $errors[] = "Combinaison email/mot de passe incorrecte";
                }
            }
        }
        $view = new View('Security/loginAdmin', 'raw-template');
        $view->errors = $errors ?? [];
        $view->form = $form->renderHtml();
        $view->title = "Foodpress | Login Admin";
    }

    public function logout()
    {
        $user = Auth::user();
        if (!$user) header("Location: /");
        session_destroy();
        if ($user->getRole() == 'admin') header('Location: /admin/login');
        else header('Location: /');
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
                $user->setRole("client");
                $user->setAdress(htmlentities($_POST['address']));
                $user->setZipcode(htmlentities($_POST['zipcode']));
                $user->setCity(htmlentities($_POST['city']));
                $user->setCountry(htmlentities($_POST['country']));
                $user->setPhone(htmlentities($_POST['phone']));
                $user->setCreatedAt($date);

                $user->save();

                $dirname = dirname(__DIR__, 1);
                $path = $dirname . '/Views/Mails/registration_confirmation.php';
                $body = file_get_contents($path);
                Mailer::sendEmail($body, $_POST['email'], 'Confirmation de votre inscription');

                # Redirection vers une vue informant l'utilisateur qu'il va recevoir un email de confirmation
            }
        }

        $view = new View('Security/registration', 'front-template');
        $view->errors = $errors ?? [];
        $view->form = $form->renderHtml();
        $view->title = "Nouvel inscription";
    }

    public function not_found()
    {

        $view = new View('Security/404', 'front-template');
        $view->title = 'Foodpress | Erreur 404';
    }

    public function forbidden()
    {
        $view = new View('Security/forbidden', 'front-template');
        $view->title = 'Foodpress | Erreur 403';
    }
}
