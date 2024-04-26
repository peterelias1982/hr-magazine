<?php

namespace App\Enums;

enum Gender : string
{
    case Male = 'male';
    case Female = 'female';
    public static function getInstances(): array
    {
        return [
            self::Male,
            self::Female,
        ];
    }
}
