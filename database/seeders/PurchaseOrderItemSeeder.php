<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PurchaseOrderItem;

class PurchaseOrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mengisi data dummy ke dalam tabel purchase_order_items
        PurchaseOrderItem::create([
            'customer_id' => 1,
            'product_item_id' => 1,
        ]);

        PurchaseOrderItem::create([
            'customer_id' => 2,
            'product_item_id' => 2,
        ]);

        // Anda dapat menambahkan lebih banyak data sesuai kebutuhan
    }
}
