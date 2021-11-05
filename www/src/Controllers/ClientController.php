<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class ClientController
{
    public function all_clients()
    {
        $user = new User();

        $users = $user->findBy(['roles' => "['ROLE_CLIENT']"]);

        $view = new View('Client/index', 'back-template');
        $view->title = 'Foodpress | Tous les clients';
        $view->users = $users;
    }
}
