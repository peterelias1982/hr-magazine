<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';

    protected $fillable = [
        "image",
        "approved",
        "bio",
        "description",
        "user_id"
    ];

    public function userAuthor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function article(): HasMany
    {
        return $this->hasMany(Article::class);
    }

}
