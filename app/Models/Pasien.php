<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = "pasiens";
    protected $fillable = [
        'nama_pasien',
        'jenis_kelamin',
        'tanggal_lahir',
        'email_telepon',
        'username',
        'password',
        'status_akun'
    ];
}
