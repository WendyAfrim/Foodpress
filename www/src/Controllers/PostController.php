<?php

// Controller destiné à la gestion des produits

namespace App\Controllers;

use App\Core\View;
use App\Core\FormVerification;
use App\Form\PageForm;
use App\Helpers\Generator;
use App\Models\Post;

class PostController
{

    /**
     * Page du formulaire pour la création des produits par le restaurateur
     * 
     */
    public function add_page(): void
    {
        $page = new Post;

        $form = new PageForm();
        $config = PageForm::getConfig();

        if (!empty($_POST)) {

            $errors = FormVerification::check($_POST, $config);

            if (!$errors) {

                $page->setTitle($_POST['title']);
                $page->setSlug($_POST['slug']);
                $page->setContent($_POST['content']);
                $page->setCreatedAt(Generator::generateDate());
                $page->setUpdatedAt(Generator::generateDate());
                $page->setEnabled(1);
                $page->setType("page");
                $page->save();
                header('Location: /admin/pages');
            }
        }
        $view = new View('Admin/pages/add', 'back-template');
        $view->form = $form->renderHtml();
        $view->errors = $errors ?? null;
        $view->title = "Foodpress | Ajouter une page";
    }

    public function all_pages()
    {
        $page = new Post;
        $pages = $page->findAll();
        $view = new View('Admin/pages/index', 'back-template');
        $view->pages = $pages;
    }

    public function edit_page($id)
    {
        $page = new Post;
        $page = $page->findByOne(['id' => $id]);
        if (!$page) {
            header('Location: /admin/pages');
        }
        $config = PageForm::getConfig();
        if (!empty($_POST)) {
            $errors = FormVerification::check($_POST, $config);
            if (!$errors) {
                $page->setTitle($_POST['title']);
                $page->setSlug($_POST['slug']);
                $page->setContent($_POST['content']);
                $page->setCreatedAt(Generator::generateDate());
                $page->setUpdatedAt(Generator::generateDate());
                $page->setEnabled(1);
                $page->setType("page");
                $page->save();
                header('Location: /admin/pages');
            }
        }
        $form = new PageForm([
            "id" => $page->getId(),
            "title" => $page->getTitle(),
            "slug" => $page->getSlug(),
            "content" => $page->getContent()
        ]);


        $view = new View('Admin/pages/edit', 'back-template');
        $view->errors = $errors ?? null;
        $view->form = $form->renderHtml();
    }

    // public function delete_page($id)
    // {
    //     $page = new Post;
    //     $page = $page->findByOne(['id' => $id]);
    //     if (!$page) {
    //         header('Location: /admin/pages');
    //     }
    //     $page->delete($id);
    //     header('Location: /admin/pages');
    // }

    public function show_page($slug)
    {

        $page = new Post;
        $page = $page->findByOne(['slug' => $slug]);
        if (!$page) {
            header('Location: /404');
        }
        switch ($page->template) {
            case "product":
                $pageTemplate = "front/products";
                break;
            case "product":
                $pageTemplate = "front/product";
                break;
            default:
                $pageTemplate = "front/base";
        }

        $view = new View($pageTemplate, 'front-template');
        $view->errors = $errors ?? null;
        $view->page = $page;
        $view->title = $page->getTitle();
    }

    public function show_home()
    {


        $view = new View('Home/home', 'front-template');
        $view->title = "Foodpress | Page d'accueil";
        $view->errors = $errors ?? null;
    }
}
