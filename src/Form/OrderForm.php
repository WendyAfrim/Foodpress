<?php

namespace App\Form;

use App\AbstractClass\AbstractForm;
use App\Models\Post;

class OrderForm extends AbstractForm
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
            "action" => "",
            "method" => "POST",
            "form-id" => "order-form",
            "submit" => "Ajouter",
            "inputs" => [
                "quantity" => [
                    "label" => 'Quantité',
                    "type" => "number",
                    "required" => true,
                    "placeholder" => "Quantité du produit",
                    "maxLength" => 50,
                    "minNumber" => 1,
                    "error" => "erreur",
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'start'
                ]
            ]
        ];
    }
}
