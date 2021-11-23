<?php

namespace App\Controllers;

use App\Core\DateGenerator;
use App\Core\FormVerification;
use App\Core\PasswordGenerator;
use App\Core\View;
use App\Form\AccountForm;
use App\Helpers\Generator;
use App\Models\User;

class AdminController
{
    /**
     * List all the administrator accounts
     *
     * @return void
     */
    public function all_admin_accounts()
    {
        $user = new User();

        $users = $user->findBy(['roles' => "admin"]);

        $view = new View('Admin/index', 'back-template');
        $view->title = 'Foodpress | Tous les comptes';
        $view->users = $users;
    }

    /**
     * Add an admin account in database
     *
     * @return void
     */
    public function add_admin_account(): void
    {
        $user = new User();

        $form = new AccountForm();
        $config = $form->createForm();

        $date = Generator::generateDate();
        $randomPassword = Generator::generatePassword(8);

        if (!empty($_POST)) {

            $errors = FormVerification::check($_POST, $config);

            if (!$errors) {

                $user->setFirstname($_POST['firstname']);
                $user->setLastname($_POST['lastname']);
                $user->setEmail($_POST['email']);
                $user->setRoles($_POST['roles']);
                $user->setPassword($randomPassword);
                $user->setCreatedAt($date);

                $user->save();
            }
        }


        $view = new View('Admin/add_user', 'back-template');
        $view->errors = $errors;
        $view->form = $form->renderHtml();
        $view->title = 'Formulaire | Ajout d\'un compte';
    }
}
