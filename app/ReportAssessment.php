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
}
