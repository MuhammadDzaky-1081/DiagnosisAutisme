<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Riwayat extends Model
{
    protected $table = "riwayats";
    protected $fillable = [
        'pasien_id',
        'no_aturan',
        'h1',
        'h2',
        'h3',
        'h4',
        'h5',
        'hasil_diagnosis',
        'akurasi_hasil_diagnosis',
        'solusi',
        'diagnosa_lain',
        'akurasi_diagnosa_lain',
        'solusi_diagnosa_lain',
        'tanggal',
    ];

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }
}
