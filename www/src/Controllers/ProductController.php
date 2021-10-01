<?php 

// Controller destiné à la gestion des produits

namespace App\Controllers;

use App\Core\Database;
use App\Core\View;
use App\Models\Product;
use App\Form\ProductForm;
use App\Core\FormVerification;

class ProductController
{

    /**
     * Page du formulaire pour la création des produits par le restaurateur
     * 
     */
    public function register_product()
    {

        $product = new Product();

        $form = new ProductForm();
        $config = $form->productFormType();

        $date = new \Datetime;
        $date = $date->format('Y-m-d H:i:s');

        if(!empty($_POST))
        {
            $errors =  FormVerification::check($_POST, $config);
            
            if (empty($errors)) {
                $product->setName(htmlentities($_POST['name']));
                $product->setType(htmlentities($_POST['type']));
                $product->setDescription(htmlentities($_POST['description']));
                $product->setPrice(htmlentities($_POST[15.9]));
                $product->setIngredients(htmlentities($_POST['ingredients']));
                $product->setImage(htmlentities($_POST['image']));
                $product->setCreatedAt($date);
                
                $product->save();
            }
        }   

        $view = new View('Product/products', 'front-template');
        $view->form = $form->renderHtml();
        $view->title = "Nouveau produit";      
    }
}
