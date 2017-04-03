<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiAkhirMonitor extends Model
{
    protected $table = 'nilaiakhir_monitoring';

    protected $fillable = [
        'user_id',
        'tahun',
        'triwulan',
        'penilai',
        'penandatangan',
        'nilaiakhir'
    ];

    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }
}
