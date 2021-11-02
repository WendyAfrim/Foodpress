<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class AdminController
{

    public function all_accounts()
    {
        $user = new User();

        $users = $user->findBy(['roles' => "['ROLE_ADMIN']"]);

        $view = new View('Admin/index', 'back-template');
        $view->title = 'Foodpress | Tous les comptes';
        $view->users = $users;
    }
}
