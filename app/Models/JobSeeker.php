<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
  use HasFactory;

    protected $fillable = [
        "user_id",
        "cv"
    ];

    public function userJobSeeker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function jobDetail(): BelongsToMany
    {
        return $this->belongsToMany(JobDetail::class, $table = 'job_applieds', $foreignPivotKey = 'jobSeeker_id', $relatedPivotKey = 'jobDetail_id');
    }

}
