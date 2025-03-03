<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Prepare data for the new user
        // Update data user dengan Eloquent Model
        $data = [
            'nama' => 'Yono',
        ];

        UserModel::where('username', 'customer-1')->update($data); // Update data user berdasarkan username

        // Coba akses model UserModel
        $user = UserModel::all(); // Ambil semua data dari tabel m_user

        // Return view dengan data user yang telah diupdate
        return view('user', ['data' => $user]);
    }
}
