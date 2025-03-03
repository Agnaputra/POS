<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'ELK001', 'barang_nama' => 'TV LED', 'harga_beli' => 3000000, 'harga_jual' => 3500000],
            ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'ELK002', 'barang_nama' => 'Laptop', 'harga_beli' => 7000000, 'harga_jual' => 7500000],
            ['barang_id' => 3, 'kategori_id' => 1, 'barang_kode' => 'ELK003', 'barang_nama' => 'Smartphone', 'harga_beli' => 5000000, 'harga_jual' => 5500000],
            ['barang_id' => 4, 'kategori_id' => 2, 'barang_kode' => 'PKN001', 'barang_nama' => 'Kaos Polos', 'harga_beli' => 50000, 'harga_jual' => 75000],
            ['barang_id' => 5, 'kategori_id' => 2, 'barang_kode' => 'PKN002', 'barang_nama' => 'Jaket Hoodie', 'harga_beli' => 200000, 'harga_jual' => 250000],
            ['barang_id' => 6, 'kategori_id' => 3, 'barang_kode' => 'MKN001', 'barang_nama' => 'Roti Tawar', 'harga_beli' => 10000, 'harga_jual' => 15000],
            ['barang_id' => 7, 'kategori_id' => 3, 'barang_kode' => 'MKN002', 'barang_nama' => 'Cokelat', 'harga_beli' => 15000, 'harga_jual' => 20000],
            ['barang_id' => 8, 'kategori_id' => 4, 'barang_kode' => 'MNM001', 'barang_nama' => 'Air Mineral', 'harga_beli' => 3000, 'harga_jual' => 5000],
            ['barang_id' => 9, 'kategori_id' => 4, 'barang_kode' => 'MNM002', 'barang_nama' => 'Jus Jeruk', 'harga_beli' => 7000, 'harga_jual' => 10000],
            ['barang_id' => 10, 'kategori_id' => 5, 'barang_kode' => 'PRH001', 'barang_nama' => 'Setrika', 'harga_beli' => 150000, 'harga_jual' => 200000],
        ];
        DB::table('m_barang')->insert($data);
    }
}
