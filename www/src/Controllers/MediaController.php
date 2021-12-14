<?php

// Controller destiné à la gestion des médias  

namespace App\Controllers;

use App\Core\DateGenerator;
use App\Core\View;
use App\Models\Media;
use App\Form\MediaForm;
use App\Core\FormVerification;
use App\Helpers\Generator;

class MediaController
{

    public function all_Media()
    {
        $media = new Media();

        $medias = $media->findAll();

        $view = new View('Admin/Media/index', 'back-template');
        $view->title = 'Foodpress | Tous Media';
        $view->medias = $medias;
    }


    public function add_media(): void
    {

        $errors = [];
        $media = new Media();

        $form = new MediaForm();
        $config = $form->createForm();

        $date = Generator::generateDate();


        if (isset($_FILES['media']) && $_FILES['media']['error'] == UPLOAD_ERR_OK) {
            if ($_FILES["media"]["size"] < 500000) {


                $folders = "public/uploads/";
                $path = $folders . basename($_FILES['media']['name']);

                if (!file_exists($folders)){
                    mkdir($folders);
                }

                if (move_uploaded_file($_FILES['media']['tmp_name'], $path)) {
                    $errors[] = "Le média" .  basename($_FILES['media']['name']) . " a été ajouté ";
                } else {
                    $errors[] = "Il y a eu une erreur lors de l'enregistrement de votre média";
                }
                

                $media->setAlt(htmlentities($_POST['alt']));
                $media->setAdd_At($date);
                $media->setFileName($_FILES['media']['name']);
                $media->setTitle(basename($_FILES['media']['name']));
            }

            $media->save();
        }

        $view = new View('Admin/media/add-media', 'back-template');
        $view->form = $form->renderHtml();
        $view->title = "Media | Ajouter un media";
        $view->errors = $errors ?? null;
    }
}
