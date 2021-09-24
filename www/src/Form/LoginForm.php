<?php 

namespace App\Form;

use App\AbstractClass\FormAbstractClass;


class RegisterForm extends FormAbstractClass
{

    public function __construct() 
    {   
        parent::__construct($this->getFormConfig());
    }

    public function getFormConfig()
    {
        return [
            "action"=>"",
            "method"=>"POST",
            "submit"=>"Se connecter",
            "table"=>"user",
            "inputs"=> [
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
                                        ]
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