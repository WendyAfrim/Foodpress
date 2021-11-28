<?php

namespace App\Controllers;

use App\Core\DateGenerator;
use App\Core\FormVerification;
use App\Core\PasswordGenerator;
use App\Core\View;
use App\Form\AccountForm;
use App\Form\MenuForm;
use App\Helpers\Generator;
use App\Models\Menu;
use App\Models\Post;
use App\Models\User;

class MenuController
{
    /**
     * Liste les liens du menu
     *
     * @return void
     */
    public function show_menu()
    {
        $menu = new Menu;
        $menu_links = $menu->findAll();
        /* $filteredPages = array_map(function($post) {
            return [$post->id => $post->getId(), $post->name => $post->getTitle()];
        }, $pages); */
        $view = new View('Admin/menu/index', 'back-template');
        $view->title = 'Foodpress | Gestion du menu';
        $view->menu = $menu_links;
    }

    /**
     * Ajoute un lien au menu
     *
     * @return void
     */
    public function add_link()
    {
        $menu = new Menu;
        /* $form = new MenuForm([
            "posts" => array_map(function($post) {
                return $post->getId();
            },$pages)
        ]); */
        $form = new MenuForm();
        $config = MenuForm::getConfig();

        if (!empty($_POST)) {
            $errors = FormVerification::check($_POST, $config);
            if (!$errors) {
                if (!empty($_POST['label'])) {
                    $menu->setLabel($_POST['label']);
                }
                else {
                    $post = (new Post)->findByOne(['id' => $_POST['post_id']]);
                    $menu->setLabel($post->getTitle());
                }
                $menu->setPostId((int)$_POST['post_id']);
                $menu->save();
            }
        }
        $view = new View('Admin/menu/add', 'back-template');
        $view->form = $form->renderHtml();
        $view->errors = $errors ?? null;
        $view->title = "Foodpress | Ajouter un lien";
    }

    public function edit_link($id) {
        $menu = new Menu;
        $menu_link = $menu->findByOne(['id' => $id]);
        if (!$menu_link) {
            header('Location: /admin/menu');
        }
        $config = MenuForm::getConfig();
        if (!empty($_POST)) {
            $errors = FormVerification::check($_POST, $config);
            if (!$errors) {
                $menu_link->setLabel($_POST['label']);
                $menu_link->setPostId((int)$_POST['post_id']);
                $menu_link->save();
            }
        }
        $form = new MenuForm([
            "id" => $menu_link->getId(),
            "label" => $menu_link->getLabel(),
            "post_id" => $menu_link->getPostId()
        ]);
        $view = new View('Admin/menu/edit', 'back-template');
        $view->errors = $errors ?? null;
        $view->form = $form->renderHtml();
    }

    public function delete_link($id) {
        $menu = new Menu;
        $menu = $menu->findByOne(['id' => $id]);
        if (!$menu) {
            header('Location: /admin/menu');
        }
        $menu->delete($id);
        header('Location: /admin/menu');
    }

}
