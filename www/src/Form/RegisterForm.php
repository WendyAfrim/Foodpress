<?php 

namespace App\Form;

use App\AbstractClass\FormAbstractClass;


class RegisterForm extends FormAbstractClass
{

    private $config;
    private $html = "";

    public function __construct() 
    {   
        $config = $this->registerFormType();
        parent::__construct($config);
        $this->renderHtml();
    }

    public function registerFormType()
    {
        return [
            "action"=>"",
            "method"=>"POST",
            "submit"=>"S'inscrire",
            "table"=>"user",
            "inputs"=> [
                            "firstname"=>[
                                            "type"=>"text", 
                                            "required"=>true,
                                            "placeholder"=>"Votre Prénom",
                                            "minLength"=>2,
                                            "error"=>"Votre prénom doit faire au minimum 2 caractères"
                                        ],
                            "lastname"=>[
                                            "type"=>"text", 
                                            "required"=>true,
                                            "placeholder"=>"Votre Nom",
                                            "minLength"=>2,
                                            "error"=>"Votre nom doit faire au minimum 2 caractères"
                                        ],
                            // "country"=>[
                            //                 "type"=>"select", 
                            //                 "required"=>true,
                            //                 "placeholder"=>"Votre Pays",
                            //                 "options"=>["fr","en"],
                            //                 "error" => "Le champ est invalide"
                            //             ],
                            "email"=>[
                                            "type"=>"email", 
                                            "unicity"=>true,
                                            "required"=>true,
                                            "placeholder"=>"Votre Email",
                                            "error"=>"Votre email n'est pas correct"
                                        ],
                            "password"=>[
                                            "type"=>"password", 
                                            "required"=>true,
                                            "placeholder"=>"Votre mot de passe",
                                            "minLength"=>4,
                                            "maxLength"=>32,
                                            "error"=>"Votre mot de passe doit faire entre 4 et 32 caractères"
                                        ],
                            "passwordConfirm"=>[
                                            "type"=>"password", 
                                            "required"=>true,
                                            "placeholder"=>"Confirmation du mot de passe",
                                            "confirm"=>"password",
                                            "error"=>"Les mots de passe ne correspondent pas"
                                        ],
                            "address" => [
                                            "type" => "text", 
                                            "required" => true, 
                                            "placeholder" => "Veuillez renseigner votre adresse",
                                            "minlength" => 10, 
                                            "maxlength" => 255, 
                                            "error" => "Votre adresse n'est pas conforme"
                            ],
                            "zipcode" => [
                                            "type" => "text",
                                            "required" => true, 
                                            "placeholder" => 'Veuillez renseigner votre code postal', 
                                            "minlength" => 4, 
                                            "maxlength" => 10,
                                            'error' => "Votre code postal n'est pas conforme"
                            ],
                            "city" => [
                                            "type" => "text", 
                                            "required" => true, 
                                            'placeholder' => 'Veuillez renseigner votre ville',
                                            "minlength" => 1, 
                                            "maxlength" => 28, 
                                            'error' => "Votre ville n'est pas conforme"
                            ],
                            "phone" => [
                                            "type" => "text", 
                                            "required" => false, 
                                            'placeholder' => 'Veuillez renseigner votre numéro de téléphone',
                                            "minlength" => 6, 
                                            "maxlength" => 15, 
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