<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class YoutubeLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'youtubeLink',
        'article_id',
        'category_id',
    ];

    public function articleCategory(): BelongsTo
    {
        return $this->belongsTo(ArticleCategory::class);
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

}
