<?php

namespace App\Form;

use App\AbstractClass\AbstractForm;
use App\Models\Post;

class SettingsForm extends AbstractForm
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
        array_unshift($filteredPages, ['value' => null, 'label' => 'Template par défaut']);
        return $filteredPages;
    }

    public static function getConfig()
    {
        return [
            "table" => "posts",
            "action" => "",
            "method" => "POST",
            "form-id" => "page-form",
            "submit" => "Sauvegarder",
            "inputs" => [
                "site_name" => [
                    "label" => 'Nom du site',
                    "type" => "text",
                    "placeholder" => "Foodpress",
                    "required" => "true",
                    "error" => "erreur",
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'end'
                ],
/*                 "post_id" => [
                    "label" => 'Page d\'accueil',
                    "type" => "select",
                    "options" => static::getPostsForSelect(),
                    "placeholder" => "Page",
                    "error" => "erreur",
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'end'
                ],
                "id" => [
                    "type" => "hidden"
                ] */
            ]
        ];
    }
}
