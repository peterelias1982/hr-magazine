<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\ArticleCategory;

class YoutubeLink extends Model
{
    use HasFactory;

    protected $fillable=[
        'youtubeLink',
        'article_id',
        'category_id',
    ];

    public function articleCategory(){
        return $this->belongsTo(ArticleCategory::class);
    }

    public function article(){
        return $this->belongsTo(Article::class);
    }

//     public function articles(){
//         return $this->morphMany(Article::class,'articleable');
// }
}
