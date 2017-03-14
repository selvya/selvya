<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        'final_status'
    ];
}
