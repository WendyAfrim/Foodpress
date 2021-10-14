<?php

namespace App\Core;

class Auth {

    public static function check() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['auth'])) {
            header('Location: /dashboard?forbidden=1');
        }
    }
}