<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
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

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function promo()
    {
        return $this->belongsTo(Promo::class, 'promo_id', 'id');
    }

    // Tambahkan metode untuk menghitung total transaksi setelah potongan harga
    public function getTotalAmountWithDiscount()
    {
        $totalAmount = $this->product_price;

        // Periksa apakah promo berlaku dan memiliki aturan potongan harga
        if ($this->promo && $this->promo->is_active && $this->promo->discount_amount > 0) {
            $discountedAmount = min($this->promo->discount_amount, $totalAmount);
            $totalAmount -= $discountedAmount;
        }

        return $totalAmount;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
}
