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

        $users = $user->findBy(['roles' => "['ROLE_ADMIN']"]);

        $view = new View('Admin/User/index', 'back-template');
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

        $errors = [];

        if (!empty($_POST)) {

            $errors = FormVerification::check($_POST, $config);

            if (!$errors) {

                $user->setFirstname($_POST['firstname']);
                $user->setLastname($_POST['lastname']);
                $user->setEmail($_POST['email']);
                $user->setRoles("['ROLE_" . strtoupper($_POST['roles'] . "']"));
                $user->setPassword($randomPassword);
                $user->setCreatedAt($date);

                $user->save();
            }
        }


        $view = new View('Admin/User/add_admin_account', 'back-template');
        $view->errors = $errors;
        $view->form = $form->renderHtml();
        $view->title = 'Formulaire | Ajout d\'un compte';
    }
}
