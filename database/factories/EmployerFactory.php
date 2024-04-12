<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'companyName' => fake()->sentence(),
            'address' => fake()->address(),
            'logo' => fake()->image("public/assets/images/employer/",640, 480, 'animals', false),
            'phone'=>fake()->phoneNumber(),
            'user_id' => fake()->unique()->numberBetween(1,5),
        ];
    }
}
