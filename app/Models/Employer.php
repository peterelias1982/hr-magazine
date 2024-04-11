<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable=["companyName","address","logo","Phone","user_id"];

    public function userEmployer() {
        return $this->belongsTo(User::class,'user_id','id');
          }
}
