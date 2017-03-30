<?php

namespace App;
use Hashids;

use Illuminate\Database\Eloquent\Model;

class StakeHolder extends Model
{
    protected $table = 'stakeholder';

    protected $fillable = [
    	  'selfassesment_id',
          'nama',               
          'email',            
          'instansi',              
          'no_hp',         
          'user_id'
    ];

    public function getHashidAttribute()
    {
        return Hashids::connection('stakeholder')->encode($this->attributes['id']);
    }
}
