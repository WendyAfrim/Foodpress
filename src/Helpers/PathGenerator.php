<?php

namespace App\Helpers;

class PathGenerator
{
    public static function getFileName(string $filename): string
    {
        $path = dirname(__DIR__, 1) . '/Views/Ajax/' . $filename . '.php';

        return $path;
    }
}
