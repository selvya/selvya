<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{
    //

    protected $table = 'satker';

    public function user()
    {
        return $this->hasOne('\App\User', 'id_satker');
    }
}
