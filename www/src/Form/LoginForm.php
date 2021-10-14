<?php

namespace App\Form;

use App\AbstractClass\AbstractForm;


class LoginForm extends AbstractForm
{


    public function __construct() 
    {   
        parent::__construct($this->getFormConfig());
    }

    public function getFormConfig()
    {
        return [
            "table" => "user",
            "action" => "",
            "method" => "POST",
            "form-id" => "login-form",
            "form-title" => 'Formulaire de connexion',
            "submit" => "Se connecter",
            "inputs" => [
                "email" => [
                    "label" => 'Email',
                    "type" => "email",
                    "required" => true,
                    "placeholder" => "",
                    'class' => ['large' => 'col-lg-12', 'medium' => 'col-md-12', 'small' => 'col-xs-12'],
                    'row' => 'start_end',
                    "error" => "Votre email n'est pas correct"
                ],
                "password" => [
                    "label" => 'Mot de passe',
                    "type" => "password",
                    "required" => true,
                    "placeholder" => "Votre mot de passe",
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'start_end',
                    "error" => "Votre mot de passe doit faire entre 4 et 32 caractères"
                ]
            ]
        ];
    }
}
