<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hashids;

class ReportAssessment extends Model
{
    protected $table = 'report_assesment';

    protected $fillable = [
    	'nilai',
        'daftarindikator_id',
        'persentase',
        'hasil',
        'triwulan',
        'tahun',
        'user_id',
        'final_status',
        'partisipasi',
        'deskripsi'
    ];

    public function getHashidAttribute()
    {
        return Hashids::connection('report')->encode($this->attributes['id']);
    }

    public function r_usr()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }

    public function r_assesment()
    {
        return $this->hasMany('\App\SelfAssesment', 'reportassesment_id');
    }
    
    public function daftar_indikator()
    {
        return $this->belongsTo('\App\DaftarIndikator', 'daftarindikator_id');
    }
}
