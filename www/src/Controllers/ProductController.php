<?php 

// Controller destiné à la gestion des produits

namespace App\Controllers;

use App\Core\Database;
use App\Core\View;
use App\Models\Product;
use App\Form\RegisterForm;
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

        $date = new \Datetime;
        $date = $date->format('Y-m-d H:i:s');


        $product->setName('name');
        $product->setType('type');
        $product->setDescription('description');
        $product->setPrice(15.9);
        $product->setIngredients('ingredients');
        $product->setImage('image');
        $product->setCreatedAt($date);
        
        $product->save();
        
            
        
        
    }
}
