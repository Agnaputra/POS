<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    // Menampilkan halaman daftar user
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'user'; // Set menu yang sedang aktif

        return view('user.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    // Fetch user data in JSON format for DataTables
    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'name', 'level_id')
            ->with('level');

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
