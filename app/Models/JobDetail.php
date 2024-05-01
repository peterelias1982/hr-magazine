<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;

class JobDetail extends Model
{
    use HasFactory;
    use HasSlug;


    protected $fillable = [
        "title",
        "slug",
        "company",
        "about_company",
        "streetNo",
        "streetName",
        "city",
        "state",
        "postalCode",
        "country",
        "image",
        "deadline",
        "email",
        "careerLevel",
        "content",
        "category_id",
        "employer_id"
    ];

    public function jobCategory(): BelongsTo
    {
        return $this->belongsTo(JobCategory::class, 'category_id', 'id');
    }

    public function Employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function jobSeekers(): BelongsToMany
    {
        return $this->belongsToMany(JobSeeker::class, 'job_applieds', 'jobDetail_id', 'jobSeeker_id');

    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
