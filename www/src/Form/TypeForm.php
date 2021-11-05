<?php

namespace App\Form;

use App\AbstractClass\AbstractForm;

class TypeForm extends AbstractForm
{
    protected $config;
    protected $html = "";

    public function __construct()
    {
        $config = $this->createForm();
        parent::__construct($config);
        $this->renderHtml();
    }

    public function createForm()
    {
        return [
            "table" => "type",
            "action" => "",
            "method" => "POST",
            "form-id" => "type-form",
            "form-title" => "",
            "submit" => "Ajouter le type",
            "inputs" => [
                'name' => [
                    "label" => "Type",
                    "type" => "text",
                    "unicity" => "name",
                    "required" => true,
                    "placeholder" => "Renseigner le type de produit",
                    "minLength" => 2,
                    "maxLength" => 32,
                    'class' => ['large' => 'col-lg-12', 'medium' => 'col-md-12', 'small' => 'col-xs-12'],
                    'row' => 'start_end',
                    "error" => "Le nom du produit doit faire entre 2 et 32 caractères"
                ],
                'description' => [
                    "label" => "Description",
                    "type" => "textarea",
                    "required" => false,
                    "placeholder" => "",
                    "minLength" => 2,
                    "maxLength" => 150,
                    'class' => ['large' => 'col-lg-12', 'medium' => 'col-md-12', 'small' => 'col-xs-12'],
                    'row' => 'start_end',
                    'rows' => 5,
                    "cols" => 33,
                    "error" => "La description du produit doit faire entre 2 et 150 caractères"
                ],
            ]
        ];
    }
}
