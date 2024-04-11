<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employer;
use App\Models\ArticleCategory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\EmployerFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // ArticleCategory::factory(5)->create();
        User::factory(5)->create();
        Employer::factory(5)->create();

    }
}
