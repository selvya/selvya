<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hashids;
use Session;
use App\User;
use App\ReportAssessment;
use App\Persentase;
use App\NilaiAkhir;

class ReviewController extends Controller
{
    //
    public function reviewPost(Request $r, $hashid)
    {
        $hashid = Hashids::connection('user')->decode($hashid);
        if (count($hashid) == 0) {
            Session::flash('alert-class', 'alert-danger');
            Session::flash('message', 'Invalid');
            return redirect()->back();
        }

        $usr = User::findOrFail($hashid[0]);
        // dd($usr);

        $triwulan = cekCurrentTriwulan();
        $t = (null != request('t')) ? Hashids::connection('tahun')->decode(request('t'))[0] : date('Y');
        $tw = (null != request('p')) ? Hashids::connection('triwulan')->decode(request('p'))[0] : $triwulan['current']->triwulan;

        //Set All ReportAssesment to 0
        $ra = ReportAssessment::where('tahun', $t)
                ->where('triwulan', $tw)
                ->where('user_id', $usr->id)
                ->update([
                    'final_status' => 0
                ]);

        //Hapus Nilai Akhir
        $nilaiAkhir = NilaiAkhir::where('tahun', $t)
                ->where('triwulan', $tw)
                ->where('user_id', $usr->id)
                ->delete();

        //Hapus Kecepatan Pelaporan
        $kp = ReportAssessment::where('user_id', $usr->id)
                ->where('tahun', $t)
                ->where('triwulan', $tw)
                ->where('daftarindikator_id', 1)
                ->delete();

        Session::flash('alert-class', 'alert-success');
        Session::flash('message', 'Berhasil');
        return redirect()->back();
    }

    public function lihatGet(Request $r, $hashid)
    {
        $hashid = Hashids::connection('user')->decode($hashid);
        if (count($hashid) == 0) {
            Session::flash('alert-class', 'alert-danger');
            Session::flash('message', 'Invalid');
            return redirect()->back();
        }

        $usr = User::findOrFail($hashid[0]);

        $triwulan = cekCurrentTriwulan();

        $t = (null != request('t')) ? Hashids::connection('tahun')->decode(request('t'))[0] : date('Y');
        $tw = (null != request('p')) ? Hashids::connection('triwulan')->decode(request('p'))[0] : $triwulan['current']->triwulan;

        $reportAssesment = ReportAssessment::where('tahun', $t)
                        ->where('triwulan', $tw)
                        ->where('user_id', $usr->id)
                        ->where('final_status', 1)
                        ->orderBy('daftarindikator_id', 'ASC')
                        ->get();

        return view('assesment.hasil-assesment-preview', compact('usr', 'triwulan', 'reportAssesment'));
    }

    public function hasilAssesment(Request $r)
    {
        $triwulan = cekCurrentTriwulan();
        $t = (null != request('tahun')) ? request('tahun') : date('Y');
        $tw = (null != request('triwulan')) ? request('triwulan') : $triwulan['current']->triwulan;
        
        $persentase = Persentase::where('tahun', $t)
                                ->where('triwulan', $tw)
                                ->where('nilai', '>', 0)
                                ->orderBy('daftarindikator_id', 'ASC')
                                ->get();

        $user = User::where('level', 'satker')->get();
        // dd($persentase);
        return view('assesment.hasil', compact('persentase', 'user', 't', 'tw'));
    }
}
