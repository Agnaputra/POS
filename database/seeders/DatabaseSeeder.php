<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LevelSeeder::class,         // level_id untuk m_user
            UserSeeder::class,          // user data
            KategoriSeeder::class,      // kategori_id untuk m_barang
            BarangSeeder::class,        // harus setelah kategori
            StokSeeder::class,
            SupplierSeeder::class,
            PenjualanSeeder::class,
            PenjualanDetailSeeder::class,
        ]);
    }
}
