<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapping extends Model
{
    protected $table = 'mapping';

    public function ms()
    {
        return $this->hasMany('\App\MappingSatker', 'mapping_id');
    }
}
