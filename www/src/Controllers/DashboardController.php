<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;
use App\Models\Product;


class DashboardController
{

    public function dashboard()
    {
        $user = new User();
        $users = $user->findBy(['role' => "client"]);

        $view = new View('Dashboard/index', 'back-template');
        $view->title = 'Tableau de bord - Foodpress';

        $view->users = $users;

        $product = new Product();
        $products = $product->findAll();
        $view->products = $products;

    }
}
