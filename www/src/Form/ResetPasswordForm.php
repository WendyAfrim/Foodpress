<?php

namespace App\Form;

use App\AbstractClass\AbstractForm;

class ResetPasswordForm extends AbstractForm
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
            "table" => "users",
            "action" => "",
            "method" => "POST",
            "form-id" => "register-form",
            // 'class' => 'front-form',
            "form-title" => 'Formulaire d\'inscription',
            "submit" => "S'inscrire",
            "inputs" => [
                "password" => [
                    "label" => 'Mot de passe',
                    "type" => "password",
                    "required" => true,
                    "placeholder" => "",
                    "minLength" => 4,
                    "maxLength" => 32,
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'start',
                    "error" => "Votre mot de passe doit faire entre 4 et 32 caractères"
                ],
                "passwordConfirm" => [
                    "label" => 'Confirmation de mot de passe',
                    "type" => "password",
                    "required" => true,
                    "placeholder" => "",
                    "confirm" => "password",
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'end',
                    "error" => "Les mots de passe ne correspondent pas"
                ],

            ]
        ];
    }
}
