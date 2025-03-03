<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    /**
     * Jalankan database seed.
     */
    public function run(): void
    {
        // Nonaktifkan sementara foreign key untuk menghindari error
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Hapus semua data lama tanpa merusak foreign key
        DB::table('t_penjualan')->delete();

        // Aktifkan kembali foreign key
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Pastikan hanya memilih user_id yang valid dari tabel m_user
        $userIds = DB::table('m_user')->pluck('user_id')->toArray();

        // Jika tidak ada user_id, hentikan proses
        if (empty($userIds)) {
            return;
        }

        $data = [];

        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'penjualan_id' => $i,
                'user_id' => $userIds[array_rand($userIds)], // Pilih user_id yang valid
                'pembeli' => 'Pembeli ' . $i,
                'penjualan_kode' => 'TRX' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'penjualan_tanggal' => Carbon::now()->subDays(rand(1, 30)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('t_penjualan')->insert($data);
    }
}
