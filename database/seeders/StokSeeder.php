<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('t_stok')->insert([
            ['barang_id' => 1, 'stok_jumlah' => 46, 'user_id' => 1, 'stok_tanggal' => now()],
            ['barang_id' => 2, 'stok_jumlah' => 39, 'user_id' => 1, 'stok_tanggal' => now()],
            ['barang_id' => 3, 'stok_jumlah' => 39, 'user_id' => 1, 'stok_tanggal' => now()],
            ['barang_id' => 4, 'stok_jumlah' => 44, 'user_id' => 1, 'stok_tanggal' => now()],
            ['barang_id' => 5, 'stok_jumlah' => 37, 'user_id' => 1, 'stok_tanggal' => now()],
        ]);
    }        
}
