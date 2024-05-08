<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'firstName'=>fake()->firstName(),
        'secondName'=>fake()->lastName(),
        'email'=>fake()->email(),
        'phone' => fake()->phoneNumber(),
        'message'=>fake()->text(100),
        ];
    }
}
