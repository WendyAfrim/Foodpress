<?php

namespace App\Controllers;

use App\Core\View;

class Dashboard
{

    public function dashboard()
    {
        $view = new View('Dashboard/index', 'back-template');
        $view->title = 'Tableau de bord - Foodpress';
    }
}
