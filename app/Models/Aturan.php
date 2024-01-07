<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aturan extends Model
{
    protected $table = "aturans";
    protected $fillable = [
        'diagnosa_id',
        'h1',
        'h2',
        'h3',
        'h4',
        'h5',
        'a_predikat',
        'z_score',
        'no_aturan',
        'operator',
        'total',
        'hasil_akurasi',
        'persentase'
    ];


    public function diagnosa(): BelongsTo
    {
        return $this->belongsTo(Diagnosis::class, 'diagnosa_id', 'id');
    }
    public function solusi() : BelongsTo
    {
        return $this->belongsTo(Diagnosissolusi::class, 'diagnosa_id', 'diagnosa_id');
    }
    public function riwayat() : BelongsTo
    {
        return $this->belongsTo(Riwayat::class, 'no_aturan', 'no_aturan');
    }
}
