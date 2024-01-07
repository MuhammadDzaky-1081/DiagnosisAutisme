<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Himpunanfuzzifikasi extends Model
{
    protected $table = "himpunanfuzzifikasis";
    protected $fillable = [
        'kriteria_id',
        'kode_himpunan',
        'nama_himpunan',
        'batas_atas',
        'batas_tengah1',
        'batas_tengah2',
        'batas_bawah'
    ];

    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id', 'id');
    }
}
