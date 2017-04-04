<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Persentase;
use App\Iku;
use App\AlatUkur;
use App\SelfAssesment;
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
        $iku = Iku::where('tahun',date('Y'))
        ->where('daftarindikator_id','5')
        ->where('namaprogram','lomba_kreasi_kreatif#'.date('Y').'#'.$triwulan['current']['triwulan'])
        ->first();
        return view('tambahan.tambah-lomba', compact('iku','triwulan','satker'));
    }
    public function tambahbudayaeksternal($id)
    {
        $satker = User::findOrFail($id);
        $triwulan       = cekCurrentTriwulan();
        $iku = Iku::where('tahun',date('Y'))
        ->where('daftarindikator_id','7')
        ->where('namaprogram','survei_budaya_eksternal#'.date('Y').'#'.$triwulan['current']['triwulan'])
        ->first();

        $ino = \App\Iku::where('namaprogram', 'pelaksanaan_program_budaya#'.date('Y').'#'.$triwulan['current']['triwulan'].'#ojk_inovatif')->first();
        $mel = \App\Iku::where('namaprogram', 'pelaksanaan_program_budaya#'.date('Y').'#'.$triwulan['current']['triwulan'].'#ojk_melayani')->first();
        $ped = \App\Iku::where('namaprogram', 'pelaksanaan_program_budaya#'.date('Y').'#'.$triwulan['current']['triwulan'].'#ojk_peduli')->first();

        $self_ino = \App\SelfAssesment::where('tahun',date('Y'))->where('triwulan',$triwulan['current']['triwulan'])->where('iku_id', $ino->id)->where('user_id',$satker->id)->get();
        $self_mel = \App\SelfAssesment::where('tahun',date('Y'))->where('triwulan',$triwulan['current']['triwulan'])->where('iku_id', $mel->id)->where('user_id',$satker->id)->get();
        $self_ped = \App\SelfAssesment::where('tahun',date('Y'))->where('triwulan',$triwulan['current']['triwulan'])->where('iku_id', $ped->id)->where('user_id',$satker->id)->get();

        return view('tambahan.tambah-budaya-eksternal',compact('iku','triwulan','satker','self_ino','self_ped','self_mel'));
    }
    public function tambahbudayainternal($id)
    {
        $satker = User::findOrFail($id);
        $triwulan       = cekCurrentTriwulan();
        $iku = Iku::where('tahun',date('Y'))
        ->where('daftarindikator_id','6')
        ->where('namaprogram','survei_budaya_internal#'.date('Y').'#'.$triwulan['current']['triwulan'])
        ->first();

        $ino = \App\Iku::where('namaprogram', 'pelaksanaan_program_budaya#'.date('Y').'#'.$triwulan['current']['triwulan'].'#ojk_inovatif')->first();
        $mel = \App\Iku::where('namaprogram', 'pelaksanaan_program_budaya#'.date('Y').'#'.$triwulan['current']['triwulan'].'#ojk_melayani')->first();
        $ped = \App\Iku::where('namaprogram', 'pelaksanaan_program_budaya#'.date('Y').'#'.$triwulan['current']['triwulan'].'#ojk_peduli')->first();

        $self_ino = \App\SelfAssesment::where('tahun',date('Y'))->where('triwulan',$triwulan['current']['triwulan'])->where('iku_id', $ino->id)->where('user_id',$satker->id)->get();
        $self_mel = \App\SelfAssesment::where('tahun',date('Y'))->where('triwulan',$triwulan['current']['triwulan'])->where('iku_id', $mel->id)->where('user_id',$satker->id)->get();
        $self_ped = \App\SelfAssesment::where('tahun',date('Y'))->where('triwulan',$triwulan['current']['triwulan'])->where('iku_id', $ped->id)->where('user_id',$satker->id)->get();

        return view('tambahan.tambah-budaya-internal',compact('iku','triwulan','satker','self_ino','self_ped','self_mel'));
    }
    public function proseslomba(Request $r, $id)
    {
        $triwulan       = cekCurrentTriwulan();
        $iku            = Iku::where('daftarindikator_id','5')->where('namaprogram','lomba_kreasi_kreatif#'.date('Y').'#'.$triwulan['current']['triwulan'])->first();
        $alat           = AlatUkur::where('iku_id',$iku->id)->where('name','lomba_kreasi_kreatif#'.date('Y').'#'.$triwulan['current']['triwulan'])->first(); 

        $self = SelfAssesment::updateOrCreate([
                'user_id'       => $id,
                'iku_id'        => $iku->id,
                'alatukur_id'   => $alat->id,
                'tahun'         => date('Y'),
                'triwulan'      => $triwulan['current']['triwulan']
            ],[
                'skala_nilai'   => $r->nilai,
                'namaprogram'   => $r->namaprogram,
                'deskripsi'     => $r->des_program
            ]);
        return redirect()->back()->with('success','berhasil ditambahkan');
    }

    public function prosesinternal(Request $r, $id)
    {
        $triwulan       = cekCurrentTriwulan();
        $iku            = Iku::where('daftarindikator_id','6')->where('namaprogram','survei_budaya_internal#'.date('Y').'#'.$triwulan['current']['triwulan'])->first();
        $alat           = AlatUkur::where('iku_id',$iku->id)->where('name','survei_budaya_internal#'.date('Y').'#'.$triwulan['current']['triwulan'])->first(); 

        $self = SelfAssesment::updateOrCreate([
                'user_id'       => $id,
                'iku_id'        => $iku->id,
                'alatukur_id'   => $alat->id,
                'tahun'         => date('Y'),
                'triwulan'      => $triwulan['current']['triwulan']
            ],[
                'skala_nilai'   => $r->nilai,
                'namaprogram'   => $r->namaprogram,
                'deskripsi'     => $r->des_program
            ]);
        return redirect()->back()->with('success','berhasil ditambahkan');
    }

    public function proseseksternal(Request $r, $id)
    {
        $triwulan       = cekCurrentTriwulan();
        $iku            = Iku::where('daftarindikator_id','7')->where('namaprogram','survei_budaya_eksternal#'.date('Y').'#'.$triwulan['current']['triwulan'])->first();
        $alat           = AlatUkur::where('iku_id',$iku->id)->where('name','survei_budaya_eksternal#'.date('Y').'#'.$triwulan['current']['triwulan'])->first(); 

        $self = SelfAssesment::updateOrCreate([
                'user_id'       => $id,
                'iku_id'        => $iku->id,
                'alatukur_id'   => $alat->id,
                'tahun'         => date('Y'),
                'triwulan'      => $triwulan['current']['triwulan']
            ],[
                'skala_nilai'   => $r->nilai,
                'namaprogram'   => $r->namaprogram,
                'deskripsi'     => $r->des_program
            ]);
        return redirect()->back()->with('success','berhasil ditambahkan');
    }
}
