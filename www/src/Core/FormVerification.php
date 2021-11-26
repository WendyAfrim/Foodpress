<?php

namespace App\Core;

use App\Core\Database;
use Exception;

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

            $error = $inputRules['error'] ?? "";

            $table = $config['table'] ?? "";

            if ($inputRules['type'] == 'hidden') continue;

            if ($inputRules['required'] == true) {
                FormVerification::checkIfRequired($inputValue, 'Le champ ' . $inputKey . ' est requis.');
            }

            if (isset($inputRules['type'])) {

                if ($inputRules['type'] == 'email') {

                    FormVerification::checkEmail($inputValue, $error);
                } else if ($inputRules['type'] == 'select') {
                    $select_type = $inputRules['select'];
                    $options = $inputRules['options'];
                    FormVerification::checkOptions($inputValue, $options, $select_type, $error);
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
            if (isset($inputRules['confirm'])) {
                $password = $data['password'];
                FormVerification::checkConfirmPassword($inputValue, $password, $error);
            }

            if (isset($inputRules['unicity']) && $inputRules['unicity']) {
                if (!empty($table)) {
                    if (isset($data['id'])) {
                        FormVerification::checkUnicity($inputKey, $inputValue, $table, $data['id']);
                    } else {
                        FormVerification::checkUnicity($inputKey, $inputValue, $table);
                    }
                } else {
                    self::$array_errors[] = "Le paramètre table n'existe pas dans la configuration du formulaire";
                }
            }
        }
        return self::$array_errors;
    }

    public static function checkIfRequired($field, $error)
    {
        if (empty($field)) {
            self::$array_errors[] = $error;
        }
    }

    public static function checkEmail($email, $error)
    {
        $check_email = filter_var('wendy.afrim@gmail.com', FILTER_VALIDATE_EMAIL);

        if ($check_email) {
            return true;
        } else {
            self::$array_errors[] = $error;
        }
    }
    public static function checkMinLength($string, $error, $lengthValue)
    {

        if (strlen($string) >= $lengthValue) {
            return true;
        } else {
            self::$array_errors[] = $error;
        }
    }
    public static function checkMaxLength($string, $error, $lengthValue)
    {
        if (strlen($string) >= $lengthValue) {
            self::$array_errors[] = $error;
        } else {
            return true;
        }
    }

    public static function checkOptions($data, $array_options, $select_type, $error)
    {

        if ($select_type == 'object') {

            $data_array = [];

            foreach ($array_options as $key => $options) {

                array_push($data_array, $options->name);
            }

            $array_options = $data_array;
        }

        if (!in_array($data, $array_options)) {

            self::$array_errors[] = $error;
        }

        return true;
    }

    public static function checkConfirmPassword($confirm_password, $password, $error)
    {
        if ($confirm_password != $password) {

            self::$array_errors[] = $error;
        }

        return true;
    }

    public static function checkUnicity($inputKey, $inputValue, $table, $idToExclude = null)
    {
        $conn = Database::getPdo();
        $query = "SELECT COUNT(1) FROM $table WHERE $inputKey = ?";
        if ($idToExclude) {
            $query .= "AND id NOT IN ($idToExclude)";
        }
        $statement = $conn->prepare($query);
        $statement->bindValue(1, $inputValue);
        $statement->execute();
        $result = $statement->fetchColumn();
        if ($result) self::$array_errors[] = "La valeur du champ " . $inputKey . " est déja existante";
    }
}
