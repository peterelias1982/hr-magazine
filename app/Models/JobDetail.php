<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Models\JobCategory;
use App\Models\Employer;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobDetail extends Model
{
    use HasFactory,HasSlug;

    protected $fillable=['title','slug','company','city','image','deadline','email','content','category_id','employer_id'];
    public function jobCategory():BelongsTo{
        return $this->belongsTo(JobCategory::class, 'category_id', 'id');
    }
    public function Employer(){
        return $this->belongsTo(Employer::class);
    }
    public function jobSeeker()
{
    return $this->belongsToMany(JobSeeker::class, 'job_applieds', 'jobDetail_id', 'jobSeeker_id');
        //->withPivot(['jobDetail_id', 'jobSeeker_id']);
}

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
