<?php

namespace Database\Seeders;


use App\Models\JobSeeker;
use App\Models\ArticleCategory;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        JobSeeker::factory(10)->create();
        ArticleCategory::factory(5)->create();
    }
}
