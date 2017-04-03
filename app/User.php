<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hashids;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    
    protected $fillable = [
        'username', 'email', 'password',
        'otoritas' , 'deputi_kom' , 'departemen' ,
        'kojk' ,'change_partner' , 'satker' ,
        'jabatanpimpinan','namapengisi','namapimpinan',
        'jumlahinsan','jenis_kantor'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getHashidAttribute()
    {
        return Hashids::connection('user')->encode($this->attributes['id']);
    }

    // public function satuan_kerja()
    // {
    //     return $this->hasOne('\App\Sarker', 'id_satker');
    // }

    public function direktorat()
    {
        return $this->belongsTo('\App\Direktorat', 'direktorat_id');
    }

    public function r_assesment()
    {
        return $this->hasMany('\App\ReportAssessment', 'user_id');
    }

    public function s_assesment()
    {
        return $this->hasMany('\App\SelfAssesment', 'user_id');
    }

    public function nilai_akhir()
    {
        return $this->hasMany('\App\NilaiAkhir', 'user_id');
    }

    public function nilai_akhir_monitoring()
    {
        return $this->hasMany('\App\NilaiAkhirMonitor', 'user_id');
    }
}
