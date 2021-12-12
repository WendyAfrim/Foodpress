<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;


class DashboardController
{

    public function dashboard()
    {
        $user = new User();
        $users = $user->findBy(['role' => "client"]);

        $view = new View('Dashboard/index', 'back-template');
        $view->title = 'Tableau de bord - Foodpress';

        $view->users = $users;
    }
}
