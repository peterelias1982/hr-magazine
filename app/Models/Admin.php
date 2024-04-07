<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Admin extends Model
{
    use HasFactory;

    protected $fillable=["user_id"];
    
    // function user(){
    //     return $this->morphOne(User::class,"user");
    // }

    public function userAdmin() {
        return $this->belongsTo(User::class,'user_id');
          }
}
