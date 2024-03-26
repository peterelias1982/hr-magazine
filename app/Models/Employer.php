<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Employer extends Model
{
    use HasFactory;

    protected $fillable=["companyName","address","logo","Phone","user_id"];

    // function users(){
    //     return $this->belongsTo(User::class);
    // }
    function user(){
        return $this->morphOne(User::class,"userable");
    }
}
