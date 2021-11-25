<?php

namespace App\Form;

use App\AbstractClass\AbstractForm;


class PageForm extends AbstractForm
{

    protected $config;
    protected $html = "";

    public function __construct(array $values = null)
    {
        $config = self::getConfig();
        if ($values) {
            foreach($values as $field => $value) {
                $config["inputs"][$field]["value"] = $value;
            }
        }
        parent::__construct($config);
        $this->renderHtml();
    }

    public static function getConfig()
    {
        return [
            "table" => "posts",
            "action" => "",
            "method" => "POST",
            "form-id" => "page-form",
            "submit" => "Créer la page",
            "inputs" => [
                "title" => [
                    "label" => 'Titre de la page',
                    "type" => "text",
                    "unicity" => true,
                    "required" => true,
                    "placeholder" => "Titre de la page",
                    "minLength" => 2,
                    "maxLength" => 50,
                    "error" => "erreur",
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'start'
                ],
                "slug" => [
                    "label" => 'Slug',
                    "type" => "text",
                    "unicity" => true,
                    "required" => true,
                    "placeholder" => "Slug de la page",
                    "minLength" => 2,
                    "error" => "erreur",
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'end'
                ],
                "content" => [
                    "label" => 'Contenu',
                    "type" => "editor",
                    "required" => true,
                    "placeholder" => "Contenu du post",
                    "minLength" => 8,
                    "error" => "erreur",
                    'class' => ['col-lg-12', 'col-md-12', 'col-xs-12','my-10'],
                ],
                "id" => [
                    "type" => "hidden"
                ]
            ]
        ];
    }
}
