<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        // Nonaktifkan foreign key constraint sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Hapus data lama tanpa reset ID
        DB::table('m_kategori')->delete();

        // Aktifkan kembali foreign key constraint
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Insert data baru
        DB::table('m_kategori')->insert([
            ['kategori_id' => 1, 'kategori_kode' => 'ELK', 'kategori_nama' => 'Elektronik'],
            ['kategori_id' => 2, 'kategori_kode' => 'PKN', 'kategori_nama' => 'Pakaian'],
            ['kategori_id' => 3, 'kategori_kode' => 'MKN', 'kategori_nama' => 'Makanan'],
            ['kategori_id' => 4, 'kategori_kode' => 'MNM', 'kategori_nama' => 'Minuman'],
            ['kategori_id' => 5, 'kategori_kode' => 'PRH', 'kategori_nama' => 'Peralatan Rumah Tangga'],
        ]);
        
        
    }
}
