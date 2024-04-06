<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Article extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'image',
        'content',
        'category_id',
        'user_id',
        'author_id',
        'approved',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }


    public function articleCategory()
    {
        return $this->belongsTo(ArticleCategory::class, 'category_id', 'id');
    }

    public function sourceArticle()
    {
        return $this->hasOne(SourceArticle::class);
    }

    public function youtubeLink()
    {
        return $this->hasOne(YoutubeLink::class);
    }

    public function articleComment()
    {
        return $this->hasMany(articleComment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags','article_id', 'tag_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
