<?php

namespace App\Form;

use App\AbstractClass\AbstractForm;


class RegisterForm extends AbstractForm
{


    public function __construct() 
    {   
        parent::__construct($this->getFormConfig());
    }

    public function getFormConfig()
    {
        return [
            "action" => "",
            "method" => "POST",
            "form-id" => "register-form",
            "form-title" => 'Formulaire d\'inscription',
            "submit" => "S'inscrire",
            "inputs" => [
                "firstname" => [
                    "label" => 'Prénom',
                    "type" => "text",
                    "required" => true,
                    "placeholder" => "",
                    "minLength" => 2,
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'start',
                    "error" => "Votre prénom doit faire au minimum 2 caractères"
                ],
                "lastname" => [
                    "label" => 'Nom',
                    "type" => "text",
                    "required" => true,
                    "placeholder" => "",
                    "minLength" => 2,
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'end',
                    "error" => "Votre nom doit faire au minimum 2 caractères"
                ],
                "email" => [
                    "label" => 'Email',
                    "type" => "email",
                    "unicity" => "email",
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
                    "placeholder" => "Confirmation du mot de passe",
                    "confirm" => "password",
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'end',
                    "error" => "Les mots de passe ne correspondent pas"
                ],
                "address" => [
                    "label" => "Adresse postale",
                    "type" => "text",
                    "required" => true,
                    "placeholder" => "Veuillez renseigner votre adresse",
                    "minlength" => 10,
                    "maxlength" => 255,
                    'class' => ['large' => 'col-lg-12', 'medium' => 'col-md-12', 'small' => 'col-xs-12'],
                    'row' => 'start_end',
                    "error" => "Votre adresse n'est pas conforme"
                ],
                "zipcode" => [
                    "label" => "Code postal",
                    "type" => "text",
                    "required" => true,
                    "placeholder" => 'Veuillez renseigner votre code postal',
                    "minlength" => 4,
                    "maxlength" => 10,
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'start',
                    'error' => "Votre code postal n'est pas conforme"
                ],
                "city" => [
                    "label" => "Ville",
                    "type" => "text",
                    "required" => true,
                    'placeholder' => 'Veuillez renseigner votre ville',
                    "minlength" => 1,
                    "maxlength" => 28,
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'end',
                    'error' => "Votre ville n'est pas conforme"
                ],
                "country" => [
                    "label" => "Pays",
                    "type" => "select",
                    "required" => true,
                    "placeholder" => "Votre Pays",
                    'class' => ['large' => 'col-lg-12', 'medium' => 'col-md-12', 'small' => 'col-xs-12'],
                    "row" => 'start_end',
                    "options" => ["France", "Angleterre"],
                    "error" => "Le champ est invalide"
                ],
                "phone" => [
                    "label" => "Téléphone",
                    "type" => "text",
                    "required" => false,
                    'placeholder' => 'Veuillez renseigner votre numéro de téléphone',
                    "minlength" => 6,
                    "maxlength" => 15,
                    'class' => ['large' => 'col-lg-12', 'medium' => 'col-md-12', 'small' => 'col-xs-12'],
                    'row' => 'start_end',
                    'error' => "Votre numéro de téléphone n'est pas conforme"
                ],
                // "captcha"=>[
                //                 "type"=>"captcha", 
                //                 "required"=>true,
                //                 "placeholder"=>"Saisir le captcha",
                //                 "src"=>"/captcha.php",
                //                 "error"=>"Le captcha ne correspond pas"
                //             ]
            ]
        ];
    }
}
