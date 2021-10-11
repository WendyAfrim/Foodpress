<?php

namespace App\Core;

use App\Core\Database;

class FormVerification
{

    protected static $array_errors = [];

    public static function check($data, $config)
    {
        if (isset($data['password'])) {
            $password = $data['password'];
        }


        foreach ($data as $inputKey => $inputValue) {


            $inputRules = $config['inputs'][$inputKey];

            $error = $inputRules['error'];


            if (isset($inputRules['type'])) {

                if ($inputRules['type'] == 'email') {

                    FormVerification::checkEmail($inputValue, $error);
                    FormVerification::checkUnicity($inputValue, $error);
                } else if ($inputRules['type'] == 'select') {
                    $options = $inputRules['options'];
                    FormVerification::checkOptions($inputValue, $options, $error);
                }
            }


            if (isset($inputRules['minLength'])) {
                $lengthValue = $inputRules['minLength'];
                FormVerification::checkMinLength($inputValue, $error, $lengthValue);
            }

            if (isset($inputRules['maxLength'])) {
                $lengthValue = $inputRules['maxLength'];
                FormVerification::checkmaxLength($inputValue, $error, $lengthValue);
            }

            if (isset($inputRules['required']) && $inputRules['required'] == true) {

                FormVerification::checkRequired($inputKey, $inputValue);
            }

            if (isset($inputRules['confirm'])) {
                $password = $data['password'];
                FormVerification::checkConfirmPassword($inputValue, $password, $error);
            }
        }
        return self::$array_errors;
        // var_dump(self::$array_errors); 
        // die;
    }

    public static function checkEmail($email, $error)
    {
        $check_email = filter_var('wendy.afrim@gmail.com', FILTER_VALIDATE_EMAIL);

        if ($check_email) {
            return true;
        } else {
            self::$array_errors[] = $error;
            echo $error . '<br>';
        }
    }
    public static function checkMinLength($string, $error, $lengthValue)
    {

        if (strlen($string) >= $lengthValue) {
            return true;
        } else {
            self::$array_errors[] = $error;
            echo $error . '<br>';
        }
    }
    public static function checkMaxLength($string, $error, $lengthValue)
    {
        if (strlen($string) >= $lengthValue) {
            self::$array_errors[] = $error;
            echo $error . '<br>';
        } else {
            return true;
        }
    }

    public static function checkRequired($field, $string)
    {
        if (empty($string)) {

            // self::$array_errors[] = $error;
            $error = "Le champ " . $field . " est requis";
            echo $error . '<br>';
        }
        return true;
    }

    public static function checkOptions($data, $array_options, $error)
    {
        if (!in_array($data, $array_options)) {

            self::$array_errors[] = $error;
            echo $error . '<br>';
        }
        return true;
    }

    public static function checkConfirmPassword($confirm_password, $password, $error)
    {
        if ($confirm_password != $password) {

            self::$array_errors[] = $error;
            echo $error . '<br>';
        }

        return true;
    }
    public static function checkUnicity($email)
    {
        $conn = Database::getPdo();


        $query = $conn->prepare("SELECT `email` FROM user WHERE `email` = ? ");
        $query->bindValue(1, $email);
        $query->execute();

        $result = $query->fetchColumn();

        // Gérer l'exception Uncaught
        // if ($result) {

        //     throw new \Exception("L'adresse email ".$email." est déja existante");
        // } 

        // return true;

    }
}
