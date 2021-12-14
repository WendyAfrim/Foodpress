<?php

namespace App\Controllers;

use App\Core\FormVerification;
use App\Core\View;
use App\Form\EmailForm;
use App\Models\Email as ModelsEmail;

class EmailController
{
    public function setTemplate()
    {

        $email = new ModelsEmail;

        $form = new EmailForm();
        $config = $form->createForm();

        if (!empty($_POST)) {
            $errors =  FormVerification::check($_POST, $config);
            // dd($errors);
        }

        $view = new View('Mails/emailForm', 'back-template');
        $view->form = $form->renderHtml();
        $view->title = 'Foodpress - Création d\'email';
    }
}
