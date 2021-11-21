<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class ClientController
{
    public function all_clients()
    {
        $user = new User();

        $users = $user->findBy(['roles' => "client"]);

        $view = new View('Client/index', 'back-template');
        $view->title = 'Foodpress | Tous les clients';
        $view->users = $users;
    }

    public function delete(int $id): void
    {
        $user = new User();
        $users = $user->findBy(['roles' => "client"]);

        $user = $user->find($id);

        $user->delete($id);

        $view = new View('Client/index', 'back-template');
        $view->title = 'Foodpress | Tous les clients';
        $view->users = $users;
    }
}
