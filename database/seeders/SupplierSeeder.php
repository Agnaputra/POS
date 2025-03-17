<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'nama_supplier' => 'PT Maju Jaya',
                'email' => 'majujaya@example.com',
                'telepon' => '081234567890',
                'alamat' => 'Jl. Sudirman No. 123, Jakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_supplier' => 'CV Sukses Abadi',
                'email' => 'suksesabadi@example.com',
                'telepon' => '081298765432',
                'alamat' => 'Jl. Merdeka No. 45, Bandung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_supplier' => 'UD Berkah Sentosa',
                'email' => 'berkahsentosa@example.com',
                'telepon' => '081312345678',
                'alamat' => 'Jl. Diponegoro No. 10, Surabaya',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        // Insert data ke tabel m_supplier
        DB::table('m_supplier')->insert($suppliers);
    }
}
