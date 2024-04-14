<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'secondName',
        'gender',
        'email',
        'password',
        "position",
        "mobile",
        "active",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['firstName', 'secondName'])
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function articleComment(): HasMany
    {
        return $this->hasMany(articleComment::class);
    }

    public function articleUser(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function authorUser(): HasOne
    {
        return $this->hasOne(Author::class, 'user_id', 'id');
    }

    public function socialMedia(): BelongsToMany
    {
        return $this->belongsToMany(SocialMedia::class)->withPivot('value');
    }

    public function adminUser(): HasOne
    {
        return $this->hasOne(Admin::class, 'user_id', 'id');
    }

    public function jobSeekerUser(): HasOne
    {
        return $this->hasOne(JobSeeker::class, 'user_id', 'id');
    }

    public function employerUser(): HasOne
    {
        return $this->hasOne(Employer::class, 'user_id', 'id');

    }

}
