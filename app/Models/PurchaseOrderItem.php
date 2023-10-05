<?php

// app/Models/PurchaseOrderItem.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    protected $fillable = ['customer_id', 'product_item_id'];

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'purchase_order_items', 'purchase_order_id', 'customer_id');
    }

    public function productItems()
    {
        return $this->belongsToMany(ProductItem::class, 'purchase_order_items', 'purchase_order_id', 'product_item_id');
    }
}
