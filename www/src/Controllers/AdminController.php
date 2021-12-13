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

        $users = $user->findBy(['role' => "admin"]);

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
        $config = AccountForm::getConfig();

        $date = Generator::generateDate();
        $randomPassword = Generator::generatePassword(8);

        $errors = [];

        if (!empty($_POST)) {

            $errors = FormVerification::check($_POST, $config);

            if (!$errors) {

                $user->setFirstname($_POST['firstname']);
                $user->setLastname($_POST['lastname']);
                $user->setEmail($_POST['email']);
                $user->setRole($_POST['role']);
                $user->setPassword($randomPassword);
                $user->setCreatedAt($date);

                $user->save();
                header('Location: /admin/accounts');
            }
        }


        $view = new View('Admin/User/add_admin_account', 'back-template');
        $view->errors = $errors;
        $view->form = $form->renderHtml();
        $view->title = 'Formulaire | Ajout d\'un compte';
    }

    public function update_admin_account($id)
    {

        $user = new User;
        $user = $user->findByOne(['id' => $id]);

        if (!$user) {
            header('Location: /admin/accounts');
        }
        $config = AccountForm::getConfig();

        if (!empty($_POST)) {
            $errors = FormVerification::check($_POST, $config);
            if (!$errors) {
                $user->setFirstname($_POST['firstname']);
                $user->setLastname($_POST['lastname']);
                $user->setEmail($_POST['email']);
                $user->setRole($_POST['role']);

                $user->save();
                header('Location: /admin/accounts');
            }
        }
        $form = new AccountForm([
            "id" => $user->getId(),
            "firstname" => $user->getFirstname(),
            "lastname" => $user->getLastname(),
            "email" => $user->getEmail(),
            "role" => $user->getRole(),
        ]);

        $view = new View('Admin/User/update_admin_account', 'back-template');
        $view->errors = $errors ?? null;
        $view->form = $form->renderHtml();
        $view->title = "Foodpress | Mettre à jour un compte admin";
    }
}
