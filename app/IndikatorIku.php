<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hashids;

class IndikatorIku extends Model
{
    //
    protected $table = 'indikator_iku';

    public function getHashidAttribute() {
        return Hashids::connection('indikator_iku')->encode($this->attributes['id']);
    }

    public function iku()
    {
        return $this->belongsTo('\App\Iku', 'iku_id');
    }
}
