<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['delivered', 'bill2', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
//        return $this->belongsToMany(Product::class);
        return $this->belongsToMany(Product::class)
            ->withPivot('qty', 'qty');
    }
}
