<?php

namespace App\Form;

use App\AbstractClass\AbstractForm;


class MediaForm extends AbstractForm
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
            "table" => "media",
            "action" => "",
            "method" => "POST",
            "form-id" => "media-form",
            "form-title" => 'Formulaire | Ajout d\'un média',
            "submit" => "Ajouter le média",
            "enctype" =>  "multipart/form-data",
            "inputs" => [
                "name" => [
                    "label" => 'Média',
                    "type" => "file",
                    "unicity" => "name",
                    "required" => true,
                    "placeholder" => "",
                    //"minLength" => "",
                    //"maxLength" => "",
                    'class' => ['col-lg-12', 'col-md-12', 'col-xs-12','my-10'],
                    'row' => 'start',
                    "error" => "Un problème est survenu lors de l\'ajout du média"
                ],
                "alt" => [
                    "label" => 'Alt',
                    "type" => "text",
                    "required" => true,
                    "placeholder" => "",
                    // "minLength"=>2,
                    'class' => ['col-lg-12', 'col-md-12', 'col-xs-12','my-10'],
                    'row' => 'end',
                    "options" => ["Entrée", "Plat", "Dessert", "Boisson"],
                    "error" => "Un problème est survenu lors de l\'ajout du text alternatif"
                ],
            ]
        ];

    }
}