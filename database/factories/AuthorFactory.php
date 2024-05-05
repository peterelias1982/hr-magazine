<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
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
            'approved' => fake()->numberBetween(0, 1),
            'description' => fake()->text(500) . "\n" . fake()->text(500) ,
            'bio' => fake()->numberBetween(0, 1),
            'user_id' => $id,
        ];
    }
}
