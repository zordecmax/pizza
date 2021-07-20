<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory;
    use Searchable;

    const SEARCHABLE_FIELDS = ['id', 'name', 'description', 'short_description'];

    public function order()
    {
        return $this->belongsToMany(Order::class)->withPivot('qty');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        return $array;
    }

    public function searchableAs()
    {
        return 'pizza';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
