<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hashids;

class Iku extends Model
{
    //
    protected $table = 'iku';

    protected $fillable = ['komponen_id', 'tahun', 'triwulan', 'persen'];

    public function getHashidAttribute() {
        return Hashids::connection('iku')->encode($this->attributes['id']);
    }

    public function komponen()
    {
        return $this->belongsTo('\App\KomponenIku', 'komponen_id');
    }

    public function indikator()
    {
        return $this->hasMany('\App\IndikatorIku', 'iku_id');
    }
}
