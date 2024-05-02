<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleCategory extends Model
{
    use HasFactory;
    use HasSlug;

    protected $table = "article_categories";

    protected $fillable = [

        'articleCategoryName',
        'subCategory',
        'hasComments',
        'hasSource',
        'hasYoutubeLink',
        'hasAuthor',
        'canModified'
    ];


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['articleCategoryName', 'subCategory'])
            ->saveSlugsTo('slug');
    }


    public function article()
    {
        return $this->hasMany(Article::class);
    }

    public function sourceArticle()
    {
        return $this->hasMany(SourceArticle::class);
    }

    public function youtubeLink()
    {
        return $this->hasMany(YoutubeLink::class);
    }


}
