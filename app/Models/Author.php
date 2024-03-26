<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Author extends Model
{
    use HasFactory;

    protected $fillable=["image","approved","bio","description","user_id"];
    
    function user(){

        return $this->morphOne(User::class,"userable");
    }
}
