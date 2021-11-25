<?php

namespace App\Controllers;

use App\Core\View;
use App\Helpers\PathGenerator;
use App\Models\User;

class AjaxController
{
    public function open_modal()
    {
        $path = PathGenerator::getFileName($_POST['filename']);
        echo file_get_contents($path);
    }

    public function delete_client($id)
    {
        $client = new User();
        $client = $client->findByOne(['id' => $id]);

        if (!$client) {
            echo 'Le client n\'existe pas';
        }

        $client->delete($id);
    }
}
