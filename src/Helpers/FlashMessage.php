<?php

namespace App\Helpers;

use App\Helpers\Session;

define('FLASH', 'FLASH_MESSAGES');
define('FLASH_ERROR', 'error');
define('FLASH_WARNING', 'warning');
define('FLASH_INFO', 'info');
define('FLASH_SUCCESS', 'success');

class FlashMessage
{
    public function __construct()
    {
        Session::startSession();
    }

    public function set(string $message, string $type = FLASH_INFO): void
    {
        if (isset($_SESSION[FLASH])) {
            unset($_SESSION[FLASH]);
        } elseif ($message !== '' && $type !== '') {
            $_SESSION[FLASH] = ['message' => $message, 'type' => $type];
        }
    }

    public function display(): void
    {
        if (!isset($_SESSION[FLASH])) {
            return;
        }

        $flashMessage = $_SESSION[FLASH];
        $this->addFormat($flashMessage);

        unset($_SESSION[FLASH]);
    }

    public function addFormat(array $flashMessage)
    {
        $type = $flashMessage['type'];
        $message = $flashMessage['message'];

        echo "<div id='alert'  class='alert alert--$type'>
                $message 
               <a class='close'>&times</a>
        </div>
        ";
    }
}
