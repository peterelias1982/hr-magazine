<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

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

    public function ArticleTag(): BelongsToMany    // i used articles word in morph relation
    {
        return $this
            ->belongsToMany(Article::class);
    }
}
