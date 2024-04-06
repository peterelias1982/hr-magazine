<?php

namespace App\Models;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleCategory extends Model
{
    use HasFactory,HasSlug;

    protected $table = "article_categories";

    protected $fillable = [

        'articleCategoryName',
        'hasComments',
        'hasSource',
        'hasYoutubeLink',
        'hasAuthor'

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
