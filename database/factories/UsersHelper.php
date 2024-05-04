<?php

namespace Database\Factories;

use App\Models\User;
use App\Traits\Files;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersHelper
{
    use Files;

    public static function createUser(string $position): int
    {
        $allImages = UsersHelper::getFilesFromDir(public_path('assets/images/users/default'));

        $gender = fake()->randomElement(['male', 'female']);
        $image = fake()->randomElement($allImages);

        if(!str_starts_with($image, $gender)) {
            if($gender === 'male') {
                $image = str_replace('female', $gender, $image);
            } else {
                $image = str_replace('male', $gender, $image);
            }
        }

        return User::create([
            'firstName' => fake()->firstName(),
            'secondName' => fake()->lastName(),
            'email' => fake()->randomElement([fake()->unique()->safeEmail(), null]),
            'email_verified_at' => fake()->randomElement([now(), null]),
            'password' => Hash::make('password'),
            'remember_token' => fake()->randomElement([Str::random(10), null]),
            'position' => $position,
            'gender' => $gender,
            'mobile' => fake()->phoneNumber(),
            'active' => fake()->numberBetween(0, 1),
            'image' => 'default' .DIRECTORY_SEPARATOR . $image,
        ])->id;
    }

}
