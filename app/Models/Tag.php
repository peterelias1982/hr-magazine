<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Models\Article;

class Tag extends Model
{
    use HasFactory,HasSlug;

    protected $fillable=[
        'tagName',
        'slug',
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('tagName')
            ->saveSlugsTo('slug');
    }

    public function articleTag()    // i used articles word in morph relation
    {
        return $this->belongsToMany(Article::class);
    }
}
