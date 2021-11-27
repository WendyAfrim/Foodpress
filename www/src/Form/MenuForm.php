<?php

namespace App\Form;

use App\AbstractClass\AbstractForm;
use App\Models\Post;

class MenuForm extends AbstractForm
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

    public static function getPostsForSelect() {
        $post = new Post;
        $pages = $post->findAll();
        $filteredPages = array_map(function($post) {
            return ['value' => $post->getId(), 'label' => $post->getTitle()];
        }, $pages);
        return $filteredPages;
    }

    public static function getConfig()
    {
        return [
            "table" => "nav_menu",
            "action" => "",
            "method" => "POST",
            "form-id" => "page-form",
            "submit" => "Créer la page",
            "inputs" => [
                "label" => [
                    "label" => 'Label du lien',
                    "type" => "text",
                    "required" => true,
                    "placeholder" => "Label du lien de la page",
                    "minLength" => 2,
                    "maxLength" => 50,
                    "error" => "erreur",
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'start'
                ],
                "post_id" => [
                    "label" => 'Page',
                    "type" => "select",
                    "options" => static::getPostsForSelect(),
                    "required" => true,
                    "placeholder" => "Page",
                    "error" => "erreur",
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'end'
                ],
                "id" => [
                    "type" => "hidden"
                ]
            ]
        ];
    }
}
