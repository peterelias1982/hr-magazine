<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'cv',
    'jobTitle',
  ];

  // function user(){
  //     return $this->morphOne(User::class,"userable");
  // }

  public function userJobSeeker()
  {
    return $this->belongsTo(User::class, 'user_id', 'id');
  }
}
