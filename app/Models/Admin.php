<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $slug)
 */
class Admin extends Model
{
    use HasFactory;

    public mixed $user_id = null;
    public mixed $created_at;
    protected $fillable = [
        "user_id"
    ];

    public function userAdmin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
