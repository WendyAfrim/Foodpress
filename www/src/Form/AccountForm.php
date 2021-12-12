<?php

namespace App\Form;

use App\AbstractClass\AbstractForm;

class AccountForm extends AbstractForm
{
    protected $config;
    protected $html;

    public function __construct()
    {
        $config = $this->createForm();
        parent::__construct($config);
        $this->renderHtml();
    }

    public static function getRolesForSelect()
    {
        $arrayRoles = [
            '0' => ['value' => 'admin', 'label' => 'Admin'],
            '1' => ['value' => 'editor', 'label' => 'Editor'],
        ];
        return $arrayRoles;
    }

    public function createForm()
    {
        return [
            "method" => "POST",
            "table" => "user",
            "form-title" => 'Formulaire | Ajout d\'un compte',
            "form-id" => 'account-form',
            "submit" => "Enregistrer",
            "inputs" => [
                'lastname' => [
                    'label' => 'Nom',
                    'type' => 'text',
                    'required' => true,
                    'placeholder' => '',
                    "minLength" => 2,
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'start',
                    "error" => "Le champ nom doit faire au minimum 2 caractères"
                ],
                'firstname' => [
                    'label' => 'Prénom',
                    'type' => 'text',
                    'required' => true,
                    'placeholder' => '',
                    "minLength" => 2,
                    'class' => ['large' => 'col-lg-6', 'medium' => 'col-md-6', 'small' => 'col-xs-12'],
                    'row' => 'end',
                    "error" => "Le champ nom doit faire au minimum 2 caractères"
                ],
                'email' => [
                    'label' => 'Email',
                    'type' => 'email',
                    'required' => true,
                    'placeholder' => 'Exemple : contact@foodpress.com',
                    "unicity" => "email",
                    'class' => ['large' => 'col-lg-12', 'medium' => 'col-md-12', 'small' => 'col-xs-12'],
                    'row' => 'start_end',
                    "error" => "Le champ email n'est pas conforme"
                ],
                'role' => [
                    'label' => 'Role',
                    'type' => 'select',
                    'options' => self::getRolesForSelect(),
                    'required' => true,
                    'placeholder' => '',
                    "minLength" => 2,
                    'class' => ['large' => 'col-lg-12', 'medium' => 'col-md-12', 'small' => 'col-xs-12'],
                    'row' => 'start_end',
                    'error' => 'Le ch'
                ],
            ]
        ];
    }
}
