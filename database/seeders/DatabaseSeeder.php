<?php

namespace Database\Seeders;

use App\Models\JobSeeker;
use App\Models\ArticleCategory;
use App\Models\User;
use App\Models\Employer;
use App\Models\SocialMediaUser;
use Illuminate\Database\Seeder;
use Database\Factories\EmployerFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SocialMediaSeeder::class,
            ArticleCategorySeeder::class,
            UserSeeder::class
        ]);

        JobSeeker::factory(5)->create();
        SocialMediaUser::factory(10)->create();
    }
}
