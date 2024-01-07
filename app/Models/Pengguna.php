<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = "penggunas";
    protected $fillable = [
        'nama_pengguna',
        'jenis_kelamin',
        'tanggal_lahir',
        'email_telepon',
        'username',
        'password',
        'status_akun',
    ];
}
