<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelfAssesment extends Model
{
    //
    protected $table = 'selfassesment';

    protected $fillable = [
    	 'user_id',
          'tahun',               
          'triwulan',            
          'iku_id',              
          'alatukur_id',         
          'definisinilai_id',
          'reportassesment_id', 
          'filelampiran',
          'skala_nilai',
          'filelampiran'
    ];


    public function iku()
    {
    	return $this->belongsTo('\App\Iku', 'iku_id');
    }
}
