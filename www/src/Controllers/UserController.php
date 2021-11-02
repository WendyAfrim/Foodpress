<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class UserController
{
    public function all_users()
    {
        $user = new User();

        $users = $user->findBy(['roles' => "['ROLE_USER']"]);

        $view = new View('User/index', 'back-template');
        $view->title = 'Foodpress | Tous les clients';
        $view->users = $users;
    }
}
