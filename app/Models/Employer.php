<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        "companyName",
        "address",
        "logo",
        "phone",
        "user_id",
        "about_company",
    ];

    public function userEmployer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function jobDetail(): HasMany
    {
        return $this->hasMany(JobDetail::class);
    }

}
