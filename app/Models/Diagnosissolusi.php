<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Diagnosissolusi extends Model
{
    protected $table = "diagnosissolusis";
    protected $fillable = [
        'diagnosa_id',
        'solusi'
    ];


    public function diagnosa(): BelongsTo
    {
        return $this->belongsTo(Diagnosis::class, 'diagnosa_id', 'id');
    }
}
