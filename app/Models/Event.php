<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;

class Event extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'title',
        'from',
        'to',
        'image',
        'streetNo',
        'city',
        'state',
        'postalCode',
        'country',
        'latitude',
        'longitude',
        'description',
        'speakers',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function agenda(): HasOne
    {
        return $this->hasOne(Agenda::class);
    }
}
