<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class SourceArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'sourceName',
        'sourceLink',
        'category_id',
        'article_id',
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
