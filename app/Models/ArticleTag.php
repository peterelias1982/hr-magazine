<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;

class ArticleTag extends Model
{
    use HasFactory,HasCompositeKey;

    protected $primaryKey = ['article_id', 'tag_id'];

    protected $fillable = [
        
        'article_id',
        'tag_id'
    ];
}
