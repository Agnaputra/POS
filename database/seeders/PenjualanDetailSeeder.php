<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanDetailSeeder extends Seeder
{
    public function run()
    {
        $this->call(PenjualanDetailSeeder::class);
        DB::table('t_penjualan_detail')->insert([
            [
                'penjualan_id' => 2,
                'barang_id' => 2,
                'harga' => 15000,
                'jumlah' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'penjualan_id' => 2,
                'barang_id' => 4,
                'harga' => 25000,
                'jumlah' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'penjualan_id' => 5,
                'barang_id' => 5,
                'harga' => 30000,
                'jumlah' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
