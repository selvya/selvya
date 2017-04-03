<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MappingSatker extends Model
{
    protected $table = 'mapping_satker';
    protected $primaryKey = 'mapping_satker_id';

    public function sat()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }
}
