<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'time_span', 'category_id', 'session', 'is_active'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
