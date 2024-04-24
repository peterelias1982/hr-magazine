<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersHelper
{
    public static function createUser(string $position): int
    {
        return User::create([
            'firstName' => fake()->firstName(),
            'secondName' => fake()->lastName(),
            'email' => fake()->randomElement([fake()->unique()->safeEmail(), null]),
            'email_verified_at' => fake()->randomElement([now(), null]),
            'password' => Hash::make('password'),
            'remember_token' => fake()->randomElement([Str::random(10), null]),
            'position' => $position,
            'gender' => fake()->randomElement(['male', 'female']),
            'mobile' => fake()->phoneNumber(),
            'active' => fake()->numberBetween(0, 1),
            'image' => fake()->randomElement(['bear.png', 'chicken.png', 'dog.png', 'panda.png', 'rabbit.png']),
        ])->id;
    }

}
