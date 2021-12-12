<?php

namespace App\Controllers;

use App\Core\View;

class HomeController
{
    /**
     * Page d'accueil 
     *
     * @return void
     */
    public function home()
    {

        $view = new View('Home/home', 'front-template');
        $view->title = "Foodpress | Page d'accueil";
    }
}
