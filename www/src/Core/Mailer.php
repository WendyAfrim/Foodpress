<?php

namespace App\Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class Mailer
{

    public static function sendEmail($content, $recipient, $subject): void
    {
        $mail = new PHPMailer(true);

        try {
            # SMTP configuration
            $mail->isSMTP();
            $mail->SMTPDebug = 1;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Port = 465;
            $mail->CharSet = 'UTF-8';
            $mail->Username = "wendy.afrim2@gmail.com";
            $mail->Password = "yvzycgbkkxbtxaiw";

            # Email configuration
            $mail->setFrom('contact@foodpress.com', 'Foodpress');
            $mail->addAddress($recipient, 'Emperor');
            $mail->IsHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $content;

            $mail->send();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
