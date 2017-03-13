<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelfAssesment extends Model
{
    //
    protected $table = 'selfassesment';


    public function iku()
    {
    	return $this->belongsTo('\App\Iku', 'iku_id');
    }
}
