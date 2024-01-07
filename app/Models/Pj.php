<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pj extends Model
{
    protected $table = 'pjs';
    protected $fillable = [
        'nama',
        'periode',
        'paraf',
        'jabatan'
    ];
}
