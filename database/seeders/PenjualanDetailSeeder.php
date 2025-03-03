<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanDetailSeeder extends Seeder
{
    public function run()
    {
        // Pastikan hanya menambahkan detail penjualan untuk transaksi yang sudah ada
        $penjualanIds = DB::table('t_penjualan')->pluck('penjualan_id')->toArray();
        $barangIds = DB::table('m_barang')->pluck('barang_id')->toArray();

        if (empty($penjualanIds) || empty($barangIds)) {
            return; // Hindari error jika tidak ada data
        }

        DB::table('t_penjualan_detail')->insert([
            [
                'penjualan_id' => in_array(2, $penjualanIds) ? 2 : $penjualanIds[array_rand($penjualanIds)],
                'barang_id' => in_array(2, $barangIds) ? 2 : $barangIds[array_rand($barangIds)],
                'harga' => 15000,
                'jumlah' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'penjualan_id' => in_array(2, $penjualanIds) ? 2 : $penjualanIds[array_rand($penjualanIds)],
                'barang_id' => in_array(4, $barangIds) ? 4 : $barangIds[array_rand($barangIds)],
                'harga' => 25000,
                'jumlah' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'penjualan_id' => in_array(5, $penjualanIds) ? 5 : $penjualanIds[array_rand($penjualanIds)],
                'barang_id' => in_array(5, $barangIds) ? 5 : $barangIds[array_rand($barangIds)],
                'harga' => 30000,
                'jumlah' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
