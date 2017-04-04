<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Hashids;
use DB;
use Session;
use Auth;
use App\NilaiAkhirMonitor;
use App\User;
use App\SelfAssesment;
use Storage;
use App\ReportAssessment;

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

    public function wizardmonitoring($id)
    {
        $t = (null != request('t')) ? Hashids::connection('tahun')->decode(request('t'))[0] : date('Y');
        $tw = (null != request('p')) ? Hashids::connection('triwulan')->decode(request('p'))[0] : $triwulan['current']->triwulan;
        $decode_user    = Hashids::connection('user')->decode($id);
        $satker = User::findOrFail($decode_user[0]);

        $inovatif = \App\Iku::where('tahun', date('Y'))
        ->where('satker', $satker->id)
        ->where('daftarindikator_id', '3')
        ->first();

        $peduli = \App\Iku::where('tahun', date('Y'))->where('namaprogram', 'pelaksanaan_program_budaya#' . $t . '#' . $tw . '#ojk_peduli')->first();
        $melayani = \App\Iku::where('tahun', date('Y'))->where('namaprogram', 'pelaksanaan_program_budaya#' . $t . '#' . $tw . '#ojk_melayani')->first();

        if(($melayani == null) || ($inovatif == null) || ($peduli == null)){
            return redirect()->back()->with('warning', 'Data belum dimasukan oleh satker');
        }

        $alatukur_melayani    = \App\AlatUkur::where('iku_id', $melayani->id)->get();
        $alatukur_peduli      = \App\AlatUkur::where('iku_id', $peduli->id)->get();
        $alatukur_inovatif    = \App\AlatUkur::where('iku_id', $inovatif->id)->get();

        return view('monitoring.wizard',compact('satker','t','tw','inovatif','melayani','peduli','alatukur_melayani','alatukur_inovatif','alatukur_peduli'));
    }
    public function proseswizard(Request $r,$id)
    {
       $triwulan = cekCurrentTriwulan();
       $t = (null != request('t')) ? Hashids::connection('tahun')->decode(request('t'))[0] : date('Y');
       $tw = (null != request('p')) ? Hashids::connection('triwulan')->decode(request('p'))[0] : $triwulan['current']->triwulan;
       $decode_user    = Hashids::connection('user')->decode($id);

       ///////MELAYANI
       if(!empty($r->alat_mel) || !empty($r->nilai_melayani)) {
            foreach ($r->alat_mel as $a => $alat_mel) {
                $self[$a] = SelfAssesment::updateOrCreate([
                    'user_id'       => Auth::user()->id,
                    'tahun'         => $t,
                    'triwulan'      => $tw,
                    'alatukur_id'   => $r->alat_mel[$a]
                ],
                    [
                        'iku_id'        => $r->iku_mel[$a],
                        'skala_nilai'   => $r->nilai_melayani[$a],
                        'deskripsi'     => $r->des_melayani[$a]
                ]);


                  //FILE MELAYANI
                        if ($r->hasFile('file_melayani') AND file_exists($r->file_melayani)) {
                            $allowedTipe = [
                                'jpg', 'jpeg', 'zip', 'rar', 'pdf', 'png', 'doc', 'docx', 'xls', 'xlsx'
                            ];

                            $validFile = in_array(pathinfo($r->file_melayani->getClientOriginalName(), PATHINFO_EXTENSION), $allowedTipe);

                            if (!$validFile) {
                                Session::flash('msg', '<div class="alert alert-danger">File Lampiran harus berupa file .zip, .rar, .jpg, .jpeg, atau .pdf</div>');
                                return redirect()->back();
                            }

                            $fileName = 'Lampiran_Melayani_Reviewer' . date('Y') . '_' . $triwulan['current']['triwulan'] . '_' . Auth::user()->hashid . '_';
                            $fileName .= str_random(4) . '.';
                            $fileName .= pathinfo($r->file_melayani->getClientOriginalName(), PATHINFO_EXTENSION);

                            // dd($fileName);

                            if (!$r->file_melayani->move(storage_path() . '/uploads/lampiran_monitoring/', $fileName)) {
                                return response()->json(['status' => false, 'data' => [], 'message' => 'Gagal mengupload File Lampiran Melayani']);
                            }

                                
                            if (Storage::disk('lampiran_monitoring')->has($self[$a]->filelampiran)) {
                                Storage::disk('lampiran_monitoring')->delete($self[$a]->filelampiran);
                            }
                            
                            $self[$a]->filelampiran = $fileName;
                            $self[$a]->save();
                    }
                    //TUTUP FILE MELAYANI

                }
           }
           //TUTUP MELAYANI

           ///////PEDULI
           if(!empty($r->alat_ped) || !empty($r->nilai_peduli)) {
                foreach ($r->alat_ped as $b => $alat_ped) {
                    $self[$b] = SelfAssesment::updateOrCreate([
                        'user_id'       => Auth::user()->id,
                        'tahun'         => $t,
                        'triwulan'      => $tw,
                        'alatukur_id'   => $r->alat_ped[$b]
                    ],
                        [
                            'iku_id'        => $r->iku_ped[$b],
                            'skala_nilai'   => $r->nilai_peduli[$b],
                            'deskripsi'     => $r->des_peduli[$b]
                    ]);


                    //FILE PEDULI
                    if ($r->hasFile('file_peduli') AND file_exists($r->file_peduli)) {
                        $allowedTipe = [
                            'jpg', 'jpeg', 'zip', 'rar', 'pdf', 'png', 'doc', 'docx', 'xls', 'xlsx'
                        ];

                        $validFile = in_array(pathinfo($r->file_peduli->getClientOriginalName(), PATHINFO_EXTENSION), $allowedTipe);

                        if (!$validFile) {
                            Session::flash('msg', '<div class="alert alert-danger">File Lampiran harus berupa file .zip, .rar, .jpg, .jpeg, atau .pdf</div>');
                            return redirect()->back();
                        }

                        $fileName = 'Lampiran_Peduli_Reviewer' . date('Y') . '_' . $triwulan['current']['triwulan'] . '_' . Auth::user()->hashid . '_';
                        $fileName .= str_random(4) . '.';
                        $fileName .= pathinfo($r->file_peduli->getClientOriginalName(), PATHINFO_EXTENSION);

                        // dd($fileName);

                        if (!$r->file_peduli->move(storage_path() . '/uploads/lampiran_monitoring/', $fileName)) {
                            return response()->json(['status' => false, 'data' => [], 'message' => 'Gagal mengupload File Lampiran Peduli']);
                        }

                            
                        if (Storage::disk('lampiran_monitoring')->has($self[$b]->filelampiran)) {
                            Storage::disk('lampiran_monitoring')->delete($self[$b]->filelampiran);
                        }
                        
                        $self[$b]->filelampiran = $fileName;
                        $self[$b]->save();
                }
                //TUTUP FILE PEDULI

            }
       }
       //TUTUP PEDULI

       ///////INOVATIF
       if(!empty($r->alat_ino) || !empty($r->nilai_inovatif)) {
            foreach ($r->alat_ino as $c => $alat_ino) {
                $self[$c] = SelfAssesment::updateOrCreate([
                    'user_id'       => Auth::user()->id,
                    'tahun'         => $t,
                    'triwulan'      => $tw,
                    'alatukur_id'   => $r->alat_ino[$c]
                ],
                    [
                        'iku_id'        => $r->iku_ino,
                        'skala_nilai'   => $r->nilai_inovatif[$c],
                        'deskripsi'     => 'null'
                ]);


                
                //FILE INOVATIF
                if ($r->hasFile('file_inovatif') AND file_exists($r->file_inovatif)) {
                    $allowedTipe = [
                        'jpg', 'jpeg', 'zip', 'rar', 'pdf', 'png', 'doc', 'docx', 'xls', 'xlsx'
                    ];

                    $validFile = in_array(pathinfo($r->file_inovatif->getClientOriginalName(), PATHINFO_EXTENSION), $allowedTipe);

                    if (!$validFile) {
                        Session::flash('msg', '<div class="alert alert-danger">File Lampiran harus berupa file .zip, .rar, .jpg, .jpeg, atau .pdf</div>');
                        return redirect()->back();
                    }

                    $fileName = 'Lampiran_Inovatif_Reviewer' . date('Y') . '_' . $triwulan['current']['triwulan'] . '_' . Auth::user()->hashid . '_';
                    $fileName .= str_random(4) . '.';
                    $fileName .= pathinfo($r->file_inovatif->getClientOriginalName(), PATHINFO_EXTENSION);

                    // dd($fileName);

                    if (!$r->file_inovatif->move(storage_path() . '/uploads/lampiran_monitoring/', $fileName)) {
                        return response()->json(['status' => false, 'data' => [], 'message' => 'Gagal mengupload File Lampiran Inovatif']);
                    }

                        
                    if (Storage::disk('lampiran_monitoring')->has($self[$c]->filelampiran)) {
                        Storage::disk('lampiran_monitoring')->delete($self[$c]->filelampiran);
                    }
                    
                    $self[$c]->filelampiran = $fileName;
                    $self[$c]->save();
                }
                //TUTUP FILE INOVATIF

            }
       }

       $self    = ReportAssessment::updateOrCreate([
                    'user_id'               => Auth::user()->id,
                    'tahun'                 => $t,
                    'triwulan'              => $tw,
                    'daftarindikator_id'    => 4
                ],
                    [
                        'nilai'                 => $r->nilai_pimpinan,
                        'deskripsi'             => $r->des_pimpinan
                ]);

       //TUTUP INOVATIF
       return redirect('detail-monitoring/'.$id.'?t='.Hashids::connection('tahun')->encode($t).'&p='.Hashids::connection('triwulan')->encode($tw))->with('success','Berhasil ditambahkan');
   }
}
