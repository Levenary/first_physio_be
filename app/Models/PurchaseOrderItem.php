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

    // Definisikan relasi dengan model ProductItem
    public function product_items()
{
    return $this->hasMany(ProductItem::class, 'purchase_order_item_id', 'id');
}

    // Definisikan relasi dengan model Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    // Definisikan relasi dengan model PurchaseOrder
    public function purchase_orders_items()
    {
        return $this->belongsTo(PurchaseOrder::class, 'purchase_order_id');
    }
}
