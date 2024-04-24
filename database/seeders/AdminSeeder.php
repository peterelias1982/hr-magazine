<?php

namespace Database\Seeders;

use App\Enums\AdminPosition;
use App\Enums\Gender;
use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'firstName' => 'superAdmin',
            'secondName' => 'administrator',
            'gender' => Gender::Male,
            'email' => 'admin@admin.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('admin'),
            'position' => AdminPosition::SuperAdmin->value,
            'active' => 1,
            'image' => 'chicken.png',
        ]);

        Admin::create([
            'user_id' => $user->id,
        ]);
    }
}
