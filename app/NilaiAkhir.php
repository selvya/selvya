<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiAkhir extends Model
{
    protected $table = 'nilaiakhir_assesment';

    protected $fillable = [
        'user_id',
        'tahun',
        'triwulan',
        'nilai'
    ];
}
