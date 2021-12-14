<?php

namespace App\Core;

use App\Helpers\Session;
use App\Models\User;

class Auth
{


    public static function check(string $role = null)
    {

        Session::startSession();
        if (!isset($_SESSION['auth'])) {
            return false;
        }
        $user = (new User)->findByOne(['id' => $_SESSION['auth']]);
        if (!$user) {
            return false;
        }
        if (isset($role)) {
            if ($user->getRole() != $role) return false;
        }
        return true;
    }

    public static function id(): ?int
    {
        Session::startSession();
        if (!isset($_SESSION['auth'])) {
            return null;
        }
        $user = (new User)->findByOne(['id' => $_SESSION['auth']]);
        if (!$user) {
            return null;
        }
        return $user->getId();
    }

    public static function user(): ?User
    {
        Session::startSession();
        if (!isset($_SESSION['auth'])) {
            return null;
        }
        $user = (new User)->findByOne(['id' => $_SESSION['auth']]);
        if (!$user) {
            return null;
        }
        return $user;
    }
}
