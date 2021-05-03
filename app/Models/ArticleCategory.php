<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'meta_title',
        'meta_description',
        'order',
        'image_id',
        'slug'
    ];

    public function articles() {
        return $this->hasMany(Article::class);
    }
    public function image() {
        return $this->hasOne(ArticleImage::class);
    }
}
