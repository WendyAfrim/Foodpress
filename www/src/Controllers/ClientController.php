<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class ClientController
{
    public function all_clients()
    {
        $user = new User();

        $users = $user->findBy(['role' => "client"]);

        $view = new View('Admin/Client/index', 'back-template');
        $view->title = 'Foodpress | Tous les clients';
        $view->users = $users;
    }
}
