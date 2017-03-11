<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnggaranTahun extends Model
{
    //
    protected $table = 'anggaran_tahun';

    protected $fillable = [
        'user_id', 'tahun', 'total_anggaran'
    ];
    
    public function anggaran_triwulan()
    {
        return $this->hasMany('\App\AnggaranTriwulan', 'anggaran_tahun_id');
    }
}
