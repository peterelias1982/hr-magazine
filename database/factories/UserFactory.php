<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'firstName' => fake()->name(),
            // 'secondName' => fake()->name(),
            // 'slug' =>fake()->unique()->slug(),
            // 'gender' => fake()->word(),
            // 'email' => fake()->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            // 'password' => static::$password ??= Hash::make('password'),
            // 'remember_token' => Str::random(10),
            // 'mobile'=>fake()-> randomNumber(5,true),
            // "position",
            //  "active",

            'firstName' => $this->faker->firstName(),
            'secondName' => $this->faker->lastName(),
            'slug' => Str::slug($this->faker->name),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(), // Assuming most users have verified emails
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // Default password hash
            'mobile' => $this->faker->phoneNumber(),
            'active' => $this->faker->boolean(95), // 95% chance of being active
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
