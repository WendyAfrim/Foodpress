<?php

namespace App\Core;

use App\Helpers\FlashMessage;

class ForgotPassword
{
    /**
     * Génération du token
     *
     * @return void
     */
    public static function generateToken()
    {
        $token = password_hash(uniqid(), PASSWORD_DEFAULT);

        return $token;
    }

    /**
     * Enregistrement du token en db
     *
     * @param string $token
     * @return void
     */
    public static function saveToken(string $token, object $user)
    {
        try {
            $user->setPasswordToken($token);
            $user->save();
        } catch (\Exception $e) {
            $flashMessage = new FlashMessage();
            $flashMessage->set("Une erreur est survenue", FLASH_ERROR);
        }
    }

    public static function sendEmail(object $user)
    {
        try {


            self::saveToken(self::generateToken(), $user);
            $token = $user->getPasswordToken();


            $dirname = dirname(__DIR__, 1);
            ob_start();
            include($dirname . '/Views/Mails/forgotten_password.php');
            $passwordConfirmationHtml = ob_get_contents();
            ob_end_clean();

            Mailer::sendEmail($passwordConfirmationHtml, $user->getEmail(), 'Foodpress | Reinitilisation de votre mot de passe');
        } catch (\Exception $e) {
            header('Location: /forgotten_password');
        }
    }
}
