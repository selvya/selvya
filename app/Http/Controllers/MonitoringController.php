<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Hashids;
use DB;
use Auth;
use App\NilaiAkhirMonitor;
use App\User;

class MonitoringController extends Controller
{
    public function hasilmonitoring($id)
    {
        $decode_user = Hashids::connection('user')->decode($id);
        $triwulan = cekCurrentTriwulan();
        
        $all = NilaiAkhirMonitor::where('tahun',date('Y'))
        ->where('triwulan', $triwulan['current']['triwulan'])
        ->where('user_id',$decode_user)
        ->get();

        $satker = User::where('id', $decode_user)->where('level','satker')->first();
        return view('monitoring.lihathasil-monitoring');
    }
    public function detailmonitoring($id)
    {
        $decode_user = Hashids::connection('user')->decode($id);
        $triwulan = cekCurrentTriwulan();
        $t = (null != request('t')) ? Hashids::connection('tahun')->decode(request('t'))[0] : date('Y');
        $tw = (null != request('p')) ? Hashids::connection('triwulan')->decode(request('p'))[0] : $triwulan['current']->triwulan;

        $all = NilaiAkhirMonitor::where('tahun',date('Y'))
        ->where('triwulan', $triwulan['current']['triwulan'])
        ->where('user_id',$decode_user)
        ->get();

        $satker = User::where('id', $decode_user)->where('level','satker')->first();
        return view('monitoring.detail-monitoring', compact('all','satker','t','tw'));
    }
    public function tambahmonitoring($id)
    {
        $triwulan = cekCurrentTriwulan();
        $t = (null != request('t')) ? Hashids::connection('tahun')->decode(request('t'))[0] : date('Y');
        $tw = (null != request('p')) ? Hashids::connection('triwulan')->decode(request('p'))[0] : $triwulan['current']->triwulan;

        $tahun          = Hashids::connection('tahun')->decode(Input::get('t'));
        $triwulan       = Hashids::connection('triwulan')->decode(Input::get('p'));
        $decode_user    = Hashids::connection('user')->decode($id);

        $satker = User::where('id', $decode_user)->where('level','satker')->first();

        $cekmonitor     = NilaiAkhirMonitor::where('user_id',$decode_user[0])
                                             ->where('penilai', Auth::user()->id)
                                             ->where('tahun',$tahun[0])
                                             ->where('triwulan',$triwulan[0])
                                             ->first();
        return view('monitoring.tambah-monitoring', compact('satker','t','tw','cekmonitor'));
    }
    public function prosestambahmonitoring(Request $r,$id)
    {
        $tahun          = Hashids::connection('tahun')->decode(Input::get('t'));
        $triwulan       = Hashids::connection('triwulan')->decode(Input::get('tw'));
        $decode_user    = Hashids::connection('user')->decode($id);

        $monitoring     = NilaiAkhirMonitor::where('user_id',$decode_user[0])
                                             ->where('penilai', Auth::user()->id)
                                             ->where('tahun',$tahun[0])
                                             ->where('triwulan',$triwulan[0])
                                             ->first();
        if (count($monitoring) == 0) {
            $monitoring                 = new NilaiAkhirMonitor;
        }
        $monitoring->user_id            = $decode_user[0];
        $monitoring->tahun              = $tahun[0];
        $monitoring->triwulan           = $triwulan[0];
        $monitoring->nilaiakhir         = 0;
        $monitoring->penilai            = Auth::user()->id;
        $monitoring->penandatangan      = 'kosong';
        $monitoring->namapengisi        = $r->nama_pengisi;
        $monitoring->change_partner     = $r->change_partner;
        $monitoring->tanggal            = date('d/m/Y');
        $monitoring->namapimpinan       = $r->pimpinan;
        $monitoring->jabatanpimpinan    = $r->jabatan;
        $monitoring->jml_insan          = $r->jml;
        $monitoring->save();

        return redirect()->back()->with('success','Berhasil ditambahkan');

    }
}
