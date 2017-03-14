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
        'username', 'email', 'password', 'otoritas' , 'deputi_kom' , 'departemen' , 'kojk' ,'change_partner' , 'satker' ,'jabatan'
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
}
