<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hashids;

class DefinisiNilai extends Model
{
    //
    protected $table = 'definisinilai';
    protected $fillable = [
        'iku_id',
        'alatukur_id',
        'deskripsi',
        'skala_nilai',
        'triwulan',
        'tahun'
    ];
    
    public function getHashidAttribute() {
        return Hashids::connection('definisinilai')->encode($this->attributes['id']);
    }
}
