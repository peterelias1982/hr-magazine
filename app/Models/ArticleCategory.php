<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Models\Article;
use App\Models\SourceArticle;
use App\Models\YoutubeLink;


class ArticleCategory extends Model
{
    use HasFactory,HasSlug;

    protected $fillable = [

        'articleCategoryName',
        'slug',
        'hasComments',
        'hasSource',
        'hasYoutubeLink',

    ];

   
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('articleCategoryName')
            ->saveSlugsTo('slug');
    }


    public function article(){
        return $this->hasMany(Article::class);
    }

    public function sourceArticle(){
        return $this->hasMany(SourceArticle::class);
    }

    public function youtubeLink(){
        return $this->hasMany(YoutubeLink::class);
    }





}
