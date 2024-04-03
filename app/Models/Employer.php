<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employer extends Model
{
    use HasFactory;

    protected $fillable=["companyName","address","logo","Phone","user_id"];

    // function users(){
    //     return $this->belongsTo(User::class);
    // }
    public function jobDetail():HasMany{
        return $this->hasMany(JobDetail::class);
       }
      public function userrel(){
            return $this->belongsTo(User::class, 'user_id');
       }
    public function user(){
        return $this->morphOne(User::class,'userable');
    }
}
