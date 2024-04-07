<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';

    protected $fillable = [
        "image",
        "approved",
        "bio",
        "description",
        "user_id"
    ];

    public function userAuthor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    // function user()
    // {

    //     return $this->morphOne(User::class, "userable");
    // }


    public function article()
    {
        return $this->hasMany(Article::class);
    }

    // public function articles(){
    //     return $this->morphMany(Article::class,'articleable');
    // }


}
