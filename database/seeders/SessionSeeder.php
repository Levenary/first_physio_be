<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Session;

class SessionSeeder extends Seeder
{
    public function run()
    {
        Session::create([
            'purchase_order_id' => 1,
            'employee_id' => 1,
            'status' => 1,
            'date_hours' => now(),
            'is_active' => true,
        ]);

        // Tambahkan entri lain sesuai kebutuhan
    }
}