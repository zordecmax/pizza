<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'path',
        'size',
        'article_id'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
