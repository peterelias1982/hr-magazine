<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobDetail>
 */
class JobDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->name(),
            "company" => fake()->company(),
            "about_company" => fake()->text(500),
            'streetNo' => fake()->numberBetween(1, 20),
            'streetName' => fake()->streetName(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'postalCode' => fake()->postcode(),
            'country' => fake()->country(),
            "image" => 'testJob.jpg',
            "deadline" => fake()->date(),
            "email" => fake()->email(),
            "careerLevel" => fake()->randomElement(["entry level", "intermediate level", "expert level"]),
            "content" => fake()->text(1500),
            "category_id" => fake()->numberBetween(1, 5),
            "employer_id" => fake()->numberBetween(1, 5),
        ];
    }
}
