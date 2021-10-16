<?php

namespace App\Form;

use App\AbstractClass\AbstractForm;


class ProductForm extends AbstractForm
{

    protected $config;
    protected $html = "";

    public function __construct()
    {
        parent::__construct($this->getFormConfig());
    }

    public function getFormConfig()
    {
        return [
            "table" => "product",
            "action" => "",
            "method" => "POST",
            "form-id" => "product-form",
            "form-title" => 'Formulaire d\'ajout de produit',
            "submit" => "Ajouter le produit",
            "inputs" => [
                "name" => [
                    "label" => 'Nom du produit',
                    "type" => "text",
                    "unicity" => "name",
                    "required" => true,
                    "placeholder" => "",
                    "minLength" => 2,
                    "maxLength" => 32,
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'start',
                    "error" => "Le nom du produit doit faire entre 2 et 32 caractères"
                ],
                "type" => [
                    "label" => 'Type',
                    "type" => "select",
                    "required" => true,
                    "placeholder" => "Sélectionner le type du produit",
                    // "minLength"=>2,
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'end',
                    "options" => ["Entrée", "Plat", "Dessert", "Boisson"],
                    "error" => "Le type ne correspond pas"
                ],
                "description" => [
                    "label" => 'Description',
                    "type" => "text",
                    "required" => true,
                    "placeholder" => "",
                    "minLength" => 8,
                    'class' => ['large' => 'col-lg-12', 'medium' => 'col-md-12', 'small' => 'col-xs-12'],
                    'row' => 'start_end',
                    "error" => "La description doit faire minimum 8 caractères"
                ],
                "price" => [
                    "label" => 'Prix',
                    "type" => "float",
                    "required" => true,
                    "placeholder" => "",
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'start',
                    "error" => "Le prix est invalide"
                ],
                "ingredients" => [
                    "label" => 'Ingrédients',
                    "type" => "text",
                    "required" => true,
                    "placeholder" => "Ingrédients",
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'end',
                    "error" => "Le champ est invalide"
                ],
                "image" => [
                    "label" => "Image",
                    "type" => "text",
                    // "src"=> "",
                    "required" => true,
                    'class' => ['large' => 'col-lg-12', 'medium' => 'col-md-12', 'small' => 'col-xs-12'],
                    'row' => 'start_end',
                    "error" => "L'image est invalide"
                ],
            ]
        ];
    }
}
