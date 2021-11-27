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
                FormVerification::checkIfRequired($inputValue, $inputKey);
            }

            if (isset($inputRules['type'])) {
                if ($inputRules['type'] == 'email') {

                    FormVerification::checkEmail($inputValue, $inputKey);
                } else if ($inputRules['type'] == 'select') {

                    FormVerification::checkOptions($inputValue, $inputRules, $inputKey);
                }
            }

            if (isset($inputRules['minLength'])) {
                $lengthValue = $inputRules['minLength'];
                FormVerification::checkMinLength($inputValue, $inputKey, $lengthValue);
            }

            if (isset($inputRules['maxLength'])) {
                $lengthValue = $inputRules['maxLength'];
                FormVerification::checkmaxLength($inputValue, $inputKey, $lengthValue);
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

    public static function checkIfRequired($field, $inputKey)
    {
        if (empty($field)) {
            self::$array_errors[] = 'Le champ ' . $inputKey . ' est requis.';
        }
    }

    public static function checkEmail($email, $inputKey)
    {
        $check_email = filter_var('wendy.afrim@gmail.com', FILTER_VALIDATE_EMAIL);

        if ($check_email) {
            return true;
        } else {
            self::$array_errors[] = 'Le champ ' . $inputKey . ' est requis.';
        }
    }
    public static function checkMinLength($string, $inputKey, $lengthValue)
    {

        if (strlen($string) >= $lengthValue) {
            return true;
        } else {
            self::$array_errors[] = "Le champ $inputKey doit faire au moins $lengthValue caractères";
        }
    }
    public static function checkMaxLength($string, $inputKey, $lengthValue)
    {
        if (strlen($string) >= $lengthValue) {
            self::$array_errors[] = "Le champ $inputKey doit faire au maximum $lengthValue caractères";
        } else {
            return true;
        }
    }

    public static function checkOptions($optionValue, $config, $inputKey)
    {
            $array_options = $config['options'];
            $optionsValues = array_map(function($option) {
                return $option['value'];
            }, $config['options']);

            if (!in_array($optionValue, $optionsValues)) {
                self::$array_errors[] = "Le champ $inputKey ne peut pas contenir de valeur '$optionValue'";
            } else {
                return true;
            }
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
