<?php

namespace Database\Seeders;

use App\Enums\AdminPosition;
use App\Enums\Gender;
use App\Models\Admin;
use App\Models\User;
use App\Traits\Files;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    use Files;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allImages = $this->getFilesFromDir(public_path('assets/images/users/default'));
        $image = fake()->randomElement($allImages);

        $user = User::create([
            'firstName' => 'superAdmin',
            'secondName' => 'administrator',
            'gender' => Gender::Male,
            'email' => 'admin@admin.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('admin'),
            'position' => AdminPosition::SuperAdmin->value,
            'active' => 1,
            'image' => 'default'.DIRECTORY_SEPARATOR. str_replace('female', 'male', $image),
        ]);

        Admin::create([
            'user_id' => $user->id,
        ]);
    }
}
