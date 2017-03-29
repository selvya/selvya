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
        'namaprogram',
        'deskripsi',              
        'alatukur_id',         
        'definisinilai_id',
        'reportassesment_id', 
        'filelampiran',
        'skala_nilai',
        'filelampiran',
        'created_at',
        'updated_at'
    ];


    public function iku()
    {
      return $this->belongsTo('\App\Iku', 'iku_id');
    }
}
