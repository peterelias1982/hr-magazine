<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
    use HasFactory;

    protected $fillable=["user_id","cv"];
    
    function user(){
        return $this->morphOne(User::class,"userable");
    }
}
