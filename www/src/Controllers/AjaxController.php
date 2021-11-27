<?php

namespace App\Controllers;

use App\Core\View;
use App\Helpers\FlashMessage;
use App\Helpers\PathGenerator;
use App\Models\User;

class AjaxController
{
    public function open_modal()
    {
        $path = PathGenerator::getFileName($_POST['filename']);
        echo file_get_contents($path);
    }

    public function delete($id)
    {
        $class = ucfirst($_POST['entity']);

        $class = 'App\Models\\' . $class;
        $object = new $class();

        $object = $object->findByOne(['id' => $id]);

        if (!$object) {
            echo 'Le client n\'existe pas';
        }

        $object->delete($id);

        $flashMessage = new FlashMessage();
        $flashMessage->set("Votre utilisateur a bien été supprimé", FLASH_INFO);
    }
}
