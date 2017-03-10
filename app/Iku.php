<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hashids;

class Iku extends Model
{
    //
    protected $table = 'iku';

    protected $fillable = [
        'daftarindikator_id',
        'tahun',
        'namaprogram', 
        'persen_id',
        'tipe',
        'keterangan',
        'tujuan',
        'programbudaya_id',
        'satker'
    ];

    public function getHashidAttribute() {
        return Hashids::connection('iku')->encode($this->attributes['id']);
    }

    public function alat_ukur() {
        return $this->hasMany('\App\AlatUkur', 'iku_id');
    }
}
