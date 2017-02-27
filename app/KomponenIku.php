<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KomponenIku extends Model
{
    //
    protected $table = 'komponen_iku';

    public function iku()
    {
        return $this->hasMany('\App\Iku', 'komponen_id');
    }
}
