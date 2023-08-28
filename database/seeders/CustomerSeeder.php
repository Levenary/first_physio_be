<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            [
                'name' => 'John Doe',
                'nik' => '123456789',
                'address' => '123 Main Street',
                'email' => 'john@example.com',
                'phone' => '123-456-7890',
            ],
            [
                'name' => 'Jane Smith',
                'nik' => '987654321',
                'address' => '456 Elm Avenue',
                'email' => 'jane@example.com',
                'phone' => '987-654-3210',
            ],
            // ... tambahkan data lain sesuai kebutuhan
        ];

        // Memasukkan data ke dalam tabel customer
        foreach ($customers as $customer) {
            DB::table('customer')->insert($customer);
        }
    }
}
