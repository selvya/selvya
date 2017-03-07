<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hashids;

class Persentase extends Model
{
    //
    protected $table = 'persentase';
    protected $fillable = ['tahun', 'triwulan', 'nilai', 'daftarindikator_id', 'nilai'];

    public function getHashidAttribute() {
        return Hashids::connection('persentase')->encode($this->attributes['id']);
    }

    public function daftar_indikator() {
        return $this->belongsTo('\App\DaftarIndikator', 'daftarindikator_id');
    }
}
