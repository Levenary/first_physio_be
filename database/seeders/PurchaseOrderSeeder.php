<?php

namespace Database\Seeders;

// database/seeders/PurchaseOrderSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseOrderSeeder extends Seeder
{
    public function run()
    {
        DB::table('purchase_orders')->insert([
            'customer_id' => 1, // ID pelanggan yang sesuai
            'product_id' => 1, // ID produk yang sesuai
            'promo_id' => null, // ID promo jika ada atau null jika tidak
            'product_price' => '100.00', // Harga produk
            'product_name' => 'Contoh Produk 1', // Nama produk
            'product_category' => 'Kategori Produk 1', // Kategori produk
            'promo_price' => null, // Harga setelah promo jika ada atau null jika tidak
            'expiration_date' => now()->addDays(30), // Tanggal kadaluarsa
            'user_id' => 1, // ID pengguna yang sesuai
            'branch_id' => 1, // ID cabang yang sesuai
            'is_active' => true, // Aktif atau tidak
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('purchase_orders')->insert([
            'customer_id' => 2, // ID pelanggan yang sesuai
            'product_id' => 2, // ID produk yang sesuai
            'promo_id' => 1, // ID promo jika ada atau null jika tidak
            'product_price' => '50.00', // Harga produk
            'product_name' => 'Contoh Produk 2', // Nama produk
            'product_category' => 'Kategori Produk 2', // Kategori produk
            'promo_price' => '40.00', // Harga setelah promo jika ada atau null jika tidak
            'expiration_date' => now()->addDays(60), // Tanggal kadaluarsa
            'user_id' => 2, // ID pengguna yang sesuai
            'branch_id' => 2, // ID cabang yang sesuai
            'is_active' => true, // Aktif atau tidak
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan data purchase order lainnya sesuai kebutuhan Anda
    }
}
