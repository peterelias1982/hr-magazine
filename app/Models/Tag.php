<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;

class Tag extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'tagName',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('tagName')
            ->saveSlugsTo('slug');
    }

    public function articleTag(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }
}
