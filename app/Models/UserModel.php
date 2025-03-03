<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user'; // Nama tabel yang digunakan
    protected $primaryKey = 'user_id'; // Primary key tabel
    public $timestamps = false; // Jika tabel tidak memiliki created_at & updated_at
}
