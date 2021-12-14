<?php

// Controller destiné à la gestion des produits

namespace App\Controllers;

use App\Core\View;

class TutoController
{
    
    public function show_tuto() {

        $view = new View('Dashboard/tuto', 'back-template');
        $view->title = "Foodpress | Bienvenue sur le tuto";

    }
}