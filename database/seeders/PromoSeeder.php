<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromoSeeder extends Seeder
{
    public function run()
    {
        DB::table('promos')->insert([
            'name' => 'Promo Diskon 10%',
            'price' => 0, // Harga tidak relevan jika ada diskon persentase
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('promos')->insert([
            'name' => 'Promo Gratis Ongkir',
            'price' => 0,
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan promo-promo lainnya sesuai kebutuhan Anda
    }
}