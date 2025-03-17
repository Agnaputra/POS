<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    // Menampilkan halaman awal user
public function index()
{
    $breadcrumb = (object) [
        "title" => "Daftar User",
        "list" => ["Home", "User"]
    ];

    $page = (object) [
        "title" => "Daftar user yang terdaftar dalam sistem"
    ];

    $activeMenu = "user"; // set menu yang sedang aktif

    $level = LevelModel::all(); // ambil data level untuk filter level

    return view('user.index', [
        'breadcrumb' => $breadcrumb,
        'page' => $page,
        'level' => $level,
        'activeMenu' => $activeMenu
    ]);
}

    // Menampilkan halaman form tambah user
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah user baru'
        ];

        $level = LevelModel::all(); // Ambil data level untuk ditampilkan di form
        $activeMenu = 'user'; // Set menu yang sedang aktif

         return view('user.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'level' => $level,
            'activeMenu' => $activeMenu
        ]);
    }

         // Menyimpan data user baru
        public function store(Request $request)
    {
        $request->validate([
            // username harus diisi, berupa string, minimal 3 karakter, dan unik di tabel m_user pada kolom username
            'username' => 'required|string|min:3|unique:m_user,username',
            // nama harus diisi, berupa string, dan maksimal 100 karakter
            'name' => 'required|string|max:100',
            // password harus diisi dan minimal 5 karakter
            'password' => 'required|min:5',
            // level_id harus diisi dan berupa angka
            'level_id' => 'required|integer'
        ]);

         // Menyimpan data user ke dalam database
        UserModel::create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => bcrypt($request->password), // Password dienkripsi sebelum disimpan
            'level_id' => $request->level_id
        ]);

        // Redirect ke halaman user dengan pesan sukses
        return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }

    // Menampilkan detail user
    public function show(string $id) {
        $user = UserModel::with('level')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail user'
        ];

        $activeMenu = 'user'; // set menu yang sedang aktif

        return view('user.show', [
            'breadcrumb' => $breadcrumb, 
            'page' => $page, 
            'user' => $user, 
            'activeMenu' => $activeMenu
        ]);
    }
    // Menampilkan halaman form edit user
    public function edit(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit user'
        ];

        $activeMenu = 'user'; 
        
        // Set menu yang sedang aktif

        return view('user.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'user' => $user,
            'level' => $level,
            'activeMenu' => $activeMenu
        ]);
    }
        // Menyimpan perubahan data user
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
            'name' => 'required|string|max:100', // Nama harus diisi, berupa string, dan maksimal 100 karakter
            'password' => 'nullable|min:5', // Password bisa diisi (minimal 5 karakter) atau bisa dikosongkan
            'level_id' => 'required|integer' // Level_id harus diisi dan berupa angka
        ]);

        $user = UserModel::find($id);

        if (!$user) {
            return redirect('/user')->with('error', 'User tidak ditemukan');
        }

        $user->update([
            'username' => $request->username,
            'name' => $request->name,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'level_id' => $request->level_id
        ]);

        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }

    // Menghapus data user
    public function destroy(string $id)
    {
        $check = UserModel::find($id);
    
    // Jika data tidak ditemukan, kembalikan dengan pesan error
        if (!$check) {
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }

        try {
            UserModel::destroy($id); // Hapus data user
            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika terjadi error saat menghapus data yang masih terkait dengan tabel lain
            return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    // Fetch user data in JSON format for DataTables
    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'name', 'level_id')
            ->with('level');
        
        // Filter data user berdasarkan level id
        if ($request->level_id) {
            $users->where('level_id', $request->level_id);
        }

        return DataTables::of($users)
            ->addIndexColumn() // Menambahkan kolom index otomatis
            ->addColumn('action', function ($user) { // Menambahkan kolom aksi
                $btn = '<a href="'.url('/user/' . $user->user_id).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/user/' . $user->user_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'. url('/user/'.$user->user_id).'" onsubmit="return confirm(\'Are you sure you want to delete this data?\');">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>';
                return $btn;
            })
            ->rawColumns(['action']) // Memberitahu bahwa kolom action mengandung HTML
            ->make(true);
    }
}
