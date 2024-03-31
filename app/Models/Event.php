<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Event extends Model
{
    use HasFactory, HasSlug;

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    protected $fillable = [
        'title',
        'fromDate',
        'toDate',
        'image',
        'address',
        'latitude',
        'longitude',
        'googleMapLink',
        'description',
        'speakers',
        ];

    public function agenda(){
        return $this->hasMany(Agenda::class);
    }

}
