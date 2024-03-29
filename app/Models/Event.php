<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Event extends Model
{
    use HasFactory,HasSlug;

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

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

    public function agenda(){
        return $this->hasOne(Agenda::class);
    }
}
