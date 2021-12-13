<?php

namespace App\Form;

use App\AbstractClass\AbstractForm;


class ForgottenPasswordForm extends AbstractForm
{


    public function __construct()
    {
        parent::__construct($this->getFormConfig());
    }

    public function getFormConfig()
    {
        return [
            "table" => "users",
            "action" => "",
            "method" => "POST",
            // 'class' => 'formLogin',
            "form-title" => 'Formulaire de mot de passe oublié',
            "submit" => "Envoyer",
            "inputs" => [
                "email" => [
                    "label" => 'Email',
                    "type" => "email",
                    "required" => true,
                    "placeholder" => "",
                    'class' => ['large' => 'col-lg-12', 'medium' => 'col-md-12', 'small' => 'col-xs-12'],
                    'row' => 'start_end',
                    "error" => "Votre email n'est pas correct"
                ]
            ]
        ];
    }
}
