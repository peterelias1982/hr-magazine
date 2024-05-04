<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait Files
{
    public static function getFilesFromDir($path): array
    {
        return array_map(function ($file) {
            if (is_file($file)) {
                return basename($file);
            }
        }, File::glob($path . '/*'));
    }
}
