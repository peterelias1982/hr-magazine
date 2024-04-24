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
        $id = UsersHelper::createUser(fake()->jobTitle());

        return [
            'companyName' => fake()->company(),
            'address' => fake()->address(),
            'about_company' => fake()->text(500),
            'logo' => 'test.jpg',
            'phone' => fake()->phoneNumber(),
            'user_id' => $id,
        ];
    }
}
