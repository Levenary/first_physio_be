<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id',
        'promo_id',
        'product_price',
        'product_name',
        'product_category',
        'promo_price',
        'expiration_date',
        'user_id',
        'branch_id',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
