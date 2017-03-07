<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hashids;

class DaftarIndikator extends Model
{
    //
    protected $table = 'daftarindikator';

    public function getHashidAttribute() {
        return Hashids::connection('daftarindikator')->encode($this->attributes['id']);
    }

    public function persentase() {
        return $this->hasMany('\App\Persentase', 'daftarindikator_id');
    }
}
