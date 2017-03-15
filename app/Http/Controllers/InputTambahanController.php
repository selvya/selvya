<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Persentase;

class InputTambahanController extends Controller
{
    public function lomba()
    {
    	$user           = User::where('level','satker')->get();
        $triwulan       = cekCurrentTriwulan();
        $persen         = Persentase::where('tahun',date('Y'))
        ->where('triwulan', $triwulan['current']['triwulan'])
        ->where('daftarindikator_id','5')
        ->first();
        
        return view('tambahan.lomba' ,compact('user','persen','triwulan'));
    }
    public function budayainternal()
    {
    	$user           = User::where('level','satker')->get();
        $triwulan       = cekCurrentTriwulan();
        $persen         = Persentase::where('tahun',date('Y'))
        ->where('triwulan', $triwulan['current']['triwulan'])
        ->where('daftarindikator_id','6')
        ->first();
        return view('tambahan.budaya-internal',compact('user','persen','triwulan'));
    }
    public function budayaeksternal()
    {
    	$user           = User::where('level','satker')->get();
        $triwulan       = cekCurrentTriwulan();
        $persen         = Persentase::where('tahun',date('Y'))
        ->where('triwulan', $triwulan['current']['triwulan'])
        ->where('daftarindikator_id','7')
        ->first();
        return view('tambahan.budaya-eksternal',compact('user','persen','triwulan'));
    }
    public function tambahlomba($id)
    {
    	return view('tambahan.tambah-lomba');
    }
    public function tambahbudayaeksternal($id)
    {
    	return view('tambahan.tambah-budaya-eksternal');
    }
    public function tambahbudayainternal($id)
    {
    	return view('tambahan.tambah-budaya-internal');
    }
}
