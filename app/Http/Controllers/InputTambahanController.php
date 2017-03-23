<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Persentase;
use Hashids;

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
        $hid = Hashids::connection('user')->decode($id);
        if (count($hid) == 0) {
            abort(404);
        }
        $satker = User::findOrFail($hid[0]);
        $triwulan       = cekCurrentTriwulan();
        $iku = \App\Iku::where('tahun',date('Y'))
        ->where('daftarindikator_id','5')
        ->where('namaprogram','lomba_kreasi_kreatif#'.date('Y').'#'.$triwulan['current']['triwulan'])
        ->first();
        return view('tambahan.tambah-lomba', compact('iku','triwulan','satker'));
    }
    public function tambahbudayaeksternal($id)
    {
        $satker = User::findOrFail($id);
        $triwulan       = cekCurrentTriwulan();
        $iku = \App\Iku::where('tahun',date('Y'))
        ->where('daftarindikator_id','7')
        ->where('namaprogram','survei_budaya_eksternal#'.date('Y').'#'.$triwulan['current']['triwulan'])
        ->first();
        return view('tambahan.tambah-budaya-eksternal',compact('iku','triwulan','satker'));
    }
    public function tambahbudayainternal($id)
    {
        $satker = User::findOrFail($id);
        $triwulan       = cekCurrentTriwulan();
        $iku = \App\Iku::where('tahun',date('Y'))
        ->where('daftarindikator_id','6')
        ->where('namaprogram','survei_budaya_internal#'.date('Y').'#'.$triwulan['current']['triwulan'])
        ->first();

        return view('tambahan.tambah-budaya-internal',compact('iku','triwulan','satker'));
    }
    public function proseslomba(Request $r, $id)
    {
        return redirect()->back();
    }
}
