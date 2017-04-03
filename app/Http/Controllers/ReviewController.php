<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hashids;
use Session;
use App\User;
use App\ReportAssessment;
use App\Persentase;
use App\NilaiAkhir;
use PDF;
use Response;
use File;
use Storage;

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
                ->first();

        //Aktifkan Pengeditan Anggaran
        $anggaranTahun = \App\AnggaranTahun::with('anggaran_triwulan')
                        ->where('tahun', $t)
                        ->where('user_id', $usr->id)
                        ->first();

        $anggaranTahun->anggaran_triwulan->where('triwulan', $tw)
                    ->first()
                    ->update(['is_final' => 0]);

        // File::delete(File::glob('foor/bar.*'));
        // if (Storage::disk('lampiran_ttd')->has($kp->filelampiran)) {
        //     // dd($isialat[$b]);
        Storage::disk('lampiran_ttd')->delete('Lampiran_Tandatangan' . $t .'_' . $tw . '_' . $usr->hashid . '_*');
        // }

        // $kp->delete();
        
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


        if (null != $r->c AND $r->c == 1) {
            // return 'aksldhas';
            // return view('cetak.hasil-self-assesment', compact('usr', 'triwulan', 'reportAssesment', 't', 'tw'));
            $pdf = PDF::loadView('cetak.hasil-self-assesment', compact('usr', 'triwulan', 'reportAssesment', 't', 'tw'));
            // $pdf = PDF::loadHTML($this->getHtmlString(compact('usr', 'triwulan', 'reportAssesment', 't', 'tw')));
            return @$pdf->stream();
        }  
        return view('assesment.hasil-assesment-preview', compact('usr', 'triwulan', 'reportAssesment','t','tw'));

    }

    public function getHtmlString($data)
    {
        return view('cetak.hasil-self-assesment', $data);
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

    public function cetakRingkasan(Request $r, $hashid)
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
                        ->orderBy('daftarindikator_id', 'ASC')
                        ->get();

        // return view('cetak.ringkasan', compact('usr', 'triwulan', 'reportAssesment', 't', 'tw'));
        $pdf = PDF::loadView('cetak.ringkasan', compact('usr', 'triwulan', 'reportAssesment', 't', 'tw'));
        
        return @$pdf->stream();
    }
}
