<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnggaranTriwulan extends Model
{
    //
    protected $table = 'anggaran_triwulan';
    protected $fillable = ['user_id', 'anggaran_tahun_id', 'realisasi', 'rencana', 'triwulan', 'file'];

}
