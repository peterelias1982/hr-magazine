<?php

namespace Database\Seeders;

use App\Models\JobSeeker;
use App\Models\ArticleCategory;
use App\Models\User;
use App\Models\Employer;
use App\Models\SocialMediaUser;
use App\Models\SocialMedia;
use App\Models\UserMedia;
use Illuminate\Database\Seeder;
use Database\Factories\EmployerFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Employer::factory(5)->create();
        JobSeeker::factory(10)->create();
        ArticleCategory::factory(5)->create();
        SocialMedia::factory(4)->create();
        UserMedia::factory(10)->create();
        SocialMediaUser::factory(10)->create();
    }
}
