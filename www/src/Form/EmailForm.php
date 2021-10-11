<?php

namespace App\Form;

use App\AbstractClass\AbstractForm;

class EmailForm extends AbstractForm
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
            // "action" => "",
            "method" => "POST",
            "form-title" => 'Formulaire | Template Email',
            "form-id" => 'email-form',
            "submit" => "Enregistrer",
            "inputs" => [
                'type' => [
                    'label' => 'Type',
                    'type' => 'text',
                    'required' => true,
                    'placeholder' => 'Exemple : Email de confirmation d\'inscription',
                    "minLength" => 2,
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'start',
                    "error" => "Le champ 'Type email' doit faire au minimum 2 caractères"
                ],
                "expediteur" => [
                    "label" => 'Expéditeur',
                    "type" => "email",
                    "required" => true,
                    "placeholder" => "Veuillez renseigner l'email de l'expéditeur",
                    "minLength" => 2,
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'end',
                    "error" => "Votre email n'est pas conforme"
                ],
                'subject' => [
                    "label" => 'Objet',
                    "type" => "text",
                    "required" => true,
                    "placeholder" => "Exemple : Confirmation de votre inscription",
                    "minLength" => 2,
                    'class' => ['large' => 'col-lg-12', 'medium' => 'col-md-12', 'small' => 'col-xs-12'],
                    'row' => 'start_end',
                    "error" => "L'objet de votre email n'est pas conforme"
                ],
                'content' => [
                    "label" => 'Corps de mail',
                    "type" => "textarea",
                    "required" => true,
                    "placeholder" => "Veuillez renseigner le contenu votre email",
                    "minLength" => 2,
                    'class' => ['large' => 'col-lg-12', 'medium' => 'col-md-12', 'small' => 'col-xs-12'],
                    'row' => 'start_end',
                    "error" => "L'objet de votre email n'est pas conforme"
                ],
                'image' => [
                    "label" => 'Image',
                    "type" => "file",
                    "required" => false,
                    "placeholder" => "",
                    "minLength" => 2,
                    'class' => ['large' => 'col-lg-12', 'medium' => 'col-md-12', 'small' => 'col-xs-12'],
                    'row' => 'start_end',
                ],

            ]
        ];
    }
}
