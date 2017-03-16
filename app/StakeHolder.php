<?php

namespace App;

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
}
