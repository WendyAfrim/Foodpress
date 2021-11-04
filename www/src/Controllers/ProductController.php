<?php

// Controller destiné à la gestion des produits

namespace App\Controllers;

use App\Core\DateGenerator;
use App\Core\View;
use App\Models\Product;
use App\Form\ProductForm;
use App\Core\FormVerification;
use App\Helpers\Generator;

class ProductController
{

    /**
     * Page du formulaire pour la création des produits par le restaurateur
     * 
     */
    public function add_product(): void
    {

        $product = new Product();

        $form = new ProductForm();
        $config = $form->createForm();

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

                $product->save();
            }
        }

        $view = new View('Product/add-product', 'back-template');
        $view->form = $form->renderHtml();
        $view->title = "Foodpress | Ajouter un produit";
    }
}
