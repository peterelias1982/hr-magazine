<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\User;

class articleComment extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'content',
        'parentComment',
        'article_id',
    ];


    public function article(){
        return $this->belongsTo(Article::class);
    }

//     public function articles(){
//         return $this->morphMany(Article::class,'articleable');
// }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
