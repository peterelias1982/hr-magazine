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
    "Job_Seeker" => "App\Models\JobSeeker",
    "Admin" => Admin::class,
    "Author" => Author::class,
    "Employer" => "App\Models\Employer",
]);

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasSlug;

    // protected $table = [ 'users'];

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
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function articleComment()
    {
        return $this->hasMany(articleComment::class);
    }

    public function articleUser()
    {
        return $this->hasMany(Article::class);
    }

    public function authorUser()
    {
        return $this->hasOne(Article::class, 'id', 'user_id');
    }

    function userable()
    {
        return $this->morphTo();
    }

    public function socialMedia()
    {
        return $this->belongsToMany(SocialMedia::class);
    }


}
