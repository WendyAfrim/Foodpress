<?php

namespace App\Helpers;

use LogicException;

class Generator
{
    /**
     * Static method that generate random password
     *
     * @param integer $length
     * @return string
     */
    public static function generatePassword(int $length): string
    {

        $uppercaseLetters  = self::generateCharacterWithCharCodeRange([65, 90]);
        $lowercaseLetters = self::generateCharacterWithCharCodeRange([97, 122]);
        $numbers = self::generateCharacterWithCharCodeRange([48, 57]);

        $allCharacters = array_merge($uppercaseLetters, $lowercaseLetters, $numbers);

        $isArrayShuffled = shuffle($allCharacters);

        if (!$isArrayShuffled) {
            throw new LogicException("Le mot de passe n'a pas pu être générer. Veuillez réessayer");
        }

        $codeArray = array_slice($allCharacters, 0, $length);
        $activation_code = implode('', $codeArray);

        return $activation_code;
    }

    /**
     * Static method that generate characters based on ASCII Table
     *
     * @param array $range
     * @return array
     */
    public static function generateCharacterWithCharCodeRange(array $range): array
    {

        return range(chr($range[0]), chr($range[1]));
    }

    /**
     * Static function generate date
     *
     * @return string
     */
    public static function generateDate(): string
    {
        $date = new \Datetime;
        $date = $date->format('Y-m-d H:i:s');

        return $date;
    }
}
