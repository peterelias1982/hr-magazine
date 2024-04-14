<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\SocialMedia;

class SocialMediaUser extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "social_media_id",
        "user_id",
        "value"
    ];

    protected $table = 'social_media_user';
}
