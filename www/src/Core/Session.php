<?php

namespace App\Core;

class Session
{
    public static function startSession()
    {
        session_start();
    }
}
