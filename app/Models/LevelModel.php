<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    use HasFactory;
    protected $table = 'm_level'; // Nama tabel yang digunakan
    protected $primaryKey = 'level_id'; // Primary key tabel

    protected $fillable = [
        'level_nama',
        'level_kode',
        
    ];

}
