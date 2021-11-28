<?php

// Controller destiné à la gestion des produits

namespace App\Controllers;

use App\Core\DateGenerator;
use App\Core\View;
use App\Models\Product;
use App\Form\ProductForm;
use App\Core\FormVerification;
use App\Form\TypeForm;
use App\Helpers\Generator;
use App\Models\Type;

class ProductController
{

    /**
     * All products in datable
     *
     * @return void
     */
    public function all_products()
    {
        $product = new Product();

        $products = $product->findAll();

        $view = new View('Product/index', 'back-template');
        $view->title = 'Foodpress | Tous les produits';
        $view->products = $products;
    }

    /**
     * Page du formulaire pour la création des produits par le restaurateur
     * 
     */
    public function add_product(): void
    {
        $product = new Product();

        $form = new ProductForm;
        $config = ProductForm::getConfig();

        $date = Generator::generateDate();


        if (!empty($_POST)) {
            $errors =  FormVerification::check($_POST, $config);

            if (empty($errors)) {
                $product->setName(htmlentities($_POST['name']));
                $product->setType(htmlentities($_POST['type']));
                $product->setDescription(htmlentities($_POST['description']));
                $product->setPrice(htmlentities($_POST['price']));
                $product->setIngredients(htmlentities($_POST['ingredients']));
                $product->setImage(htmlentities($_POST['image']));
                $product->setCreatedAt($date);
                $product->setUpdatedAt($date);
                $product->save();
            }
        }

        $view = new View('Product/add-product', 'back-template');
        $view->form = $form->renderHtml();
        $view->errors = $errors ?? null;
        $view->title = "Foodpress | Ajouter un produit";
    }


    public function add_product_type(): void
    {

        $type = new Type();

        $form = new TypeForm;
        $config = $form->createForm();
        $date = Generator::generateDate();

        if (!empty($_POST)) {
            $errors =  FormVerification::check($_POST, $config);

            if (empty($errors)) {
                $type->setName(htmlentities($_POST['name']));
                $type->setIs_enable(true);
                $type->setCreated_at($date);
                $type->setUpdated_at($date);

                $type->save();
            }
        }
        $types = $type->findBy(['is_enable' => true]);


        $view = new View('Product/add-type', 'back-template');
        $view->form = $form->renderHtml();
        $view->types = $types;
        $view->errors = $errors ?? [];
        $view->title = "Foodpress | Ajouter un type";
    }
    
    public function update_product($id) {

        $product = new Product;
        $product = $product->findByOne(['id' => $id]);

        $date = Generator::generateDate();

        if (!$product) {
            header('Location: /admin/products');
        }
        $config = ProductForm::getConfig();
        if (!empty($_POST)) {
            $errors = FormVerification::check($_POST, $config);
            if (!$errors) {
                $product->setName($_POST['name']);
                $product->setType($_POST['type']);
                $product->setDescription($_POST['description']);
                $product->setPrice($_POST['price']);
                $product->setIngredients($_POST['ingredients']);
                $product->setImage($_POST['image']);
                $product->setUpdatedAt($date);
                $product->save();
                header('Location: /admin/products');
            }
        }
        $form = new ProductForm([
            "id" => $product->getId(),
            "name" => $product->getName(),
            "type" => $product->getType(),
            "description" => $product->getDescription(),
            "price" => $product->getPrice(),
            "ingredients" => $product->getIngredients(),
            "image" => $product->getImage()
        ]);

        $view = new View('Product/update-product', 'back-template');
        $view->errors = $errors ?? null;
        $view->form = $form->renderHtml();
        $view->title = "Foodpress | Mettre à jour une fiche produit";
    }

    public function delete_product($id) {
        $product = new Product;
        $product = $product->findByOne(['id' => $id]);
        if (!$product) {
            header('Location: /admin/products');
        }
        $product->delete($id);
        header('Location: /admin/products');
    }
}
