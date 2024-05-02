<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'title',
        'fromDate',
        'toDate',
        'image',
        'streetNo',
        'streetName',
        'city',
        'state',
        'postalCode',
        'country',
        'latitude',
        'longitude',
        'googleMapLink',
        'description',
        'speakers',
    ];

    public function agenda(): HasMany
    {
        return $this->hasMany(Agenda::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

}
