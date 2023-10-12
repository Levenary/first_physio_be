<?php

// app/Models/PurchaseOrderItem.php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_item_id'
    ];

    // Define relasi dengan model lain jika diperlukan
    public function productItem()
    {
        return $this->belongsTo(ProductItem::class);
    }

  
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
