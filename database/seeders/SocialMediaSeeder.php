<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        SocialMedia::insert([
            ['mediaName' => \App\Enums\SocialMedia::LinkedIn->value],
            ['mediaName' => \App\Enums\SocialMedia::Facebook->value],
            ['mediaName' => \App\Enums\SocialMedia::Instagram->value],
            ['mediaName' => \App\Enums\SocialMedia::Twitter->value],
        ]);
    }
}
