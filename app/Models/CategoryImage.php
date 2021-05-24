<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'size',
        'category_id'
    ];

    public function articleCategory() {

        return $this->belongsTo(ArticleCategory::class);
    }
}
