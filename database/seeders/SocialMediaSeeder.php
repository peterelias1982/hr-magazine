<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('social_media')->delete(); //aviod duplicating
        

       
       $media= [
            [
            'mediaName'=>'linkedin',
           
            ],
            [
            'mediaName'=>'twitter',
            
            ],
            [
            'mediaName'=>'instagram',
            
            ],
            [
            'mediaName'=>'facebook',
            
        ]
            ];
    foreach ($media as $amedia) {
        SocialMedia::create($amedia);
    }
    }
}
