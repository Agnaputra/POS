<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        // $data = [
        //     'kategori_kode' => 'SNK',
        //     'kategori_nama' => 'Snack/Makanan Ringan',
        //     'created_at' => now(), // Perbaikan operator dari '->' menjadi '=>'
        // ];

        // DB::table('m_kategori')->insert($data); // Menggunakan Query Builder untuk insert
        // return 'Insert data baru berhasil ke tabel m_kategori';

         // Mengupdate kategori dengan kategori_kode = 'SNK'
//          $row = DB::table('m_kategori')
//          ->where('kategori_kode', 'SNK')
//          ->update(['kategori_nama' => 'Camilan']);

//  return 'Update data berhasil. Jumlah data yang diupdate: ' . $row . ' baris';

        // // Menghapus data dengan kategori_kode = 'SNK'
        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row . ' baris';

        // Mengambil semua data dari tabel m_kategori
        $data = DB::table('m_kategori')->get();
        return view('kategori', ['data' => $data]);
    }
}

