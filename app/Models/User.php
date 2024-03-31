<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Notifications\Notifiable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
// use Illuminate\Database\Eloquent\Model;
Relation::morphMap([
    "Job_Seeker"=>"App\Models\JobSeeker",
    "Admin"=>Admin::class,
    "Author"=>Author::class,
    "Employer"=>"App\Models\Employer",
]);

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
        
        'name',
        'email',
        'password',
        "position",
        "slug",
        "mobile",
        // "userable_type",
        // "userable_id",
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

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function articleComment(){
        return $this->hasMany(articleComment::class);
    }

    public function article(){
        return $this->hasMany(Article::class);
    }

    function userable(){
        return $this->morphTo();
    }

    public function socialMedia()
    {
        return $this->belongsToMany(SocialMedia::class);
    }
}
