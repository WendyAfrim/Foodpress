<?php

namespace App\Controllers;

use App\Core\DateGenerator;
use App\Core\FormVerification;
use App\Core\PasswordGenerator;
use App\Core\View;
use App\Form\AccountForm;
use App\Helpers\Generator;
use App\Models\Menu;
use App\Models\Post;
use App\Models\User;

class MenuController
{
    /**
     * List all the administrator accounts
     *
     * @return void
     */
    public function show_menu()
    {
        $menu = new Menu;
        $menu = $menu->findAll();
        $view = new View('Admin/menu/index', 'back-template');
        $view->title = 'Foodpress | Gestion du menu';
        $view->menu = $menu;
    }
}
