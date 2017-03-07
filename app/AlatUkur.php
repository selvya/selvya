<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hashids;

class AlatUkur extends Model
{
    //
    protected $table = 'alatukur';
    protected $fillable = ['iku_id', 'name'];

    public function getHashidAttribute() {
        return Hashids::connection('alatukur')->encode($this->attributes['id']);
    }

    public function definisi() {
        return $this->hasMany('\App\DefinisiNilai', 'alatukur_id');
    }
}
