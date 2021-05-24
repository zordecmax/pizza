<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'short_description',
        'published',
        'content',
        'article_category_id',
        'image_id',
        'tag_id',
        'meta_title',
        'meta_description',
        'user_id',
        'slug'
    ];

    public function tags() {
      return $this->belongsToMany(Tag::class);
    }

    public function categories() {
        return $this->belongsTo(ArticleCategory::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function images() {
        return $this->hasOne(ArticleImage::class);
    }
}
