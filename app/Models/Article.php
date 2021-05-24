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
      return $this->belongsToMany(Tag::class, 'article_tags');
    }

    public function category() {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function image() {
        return $this->hasOne(ArticleImage::class);
    }
}
