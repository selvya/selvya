<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use Auth;
use App\AnggaranTahun;
use App\AnggaranTriwulan;
use App\Persentase;
use App\Iku;
use App\AlatUkur;
use App\DefinisiNilai;
use App\ReportAssessment;
use Storage;
use Filesystem;

class AnggaranController extends Controller
{
    //
    public function index(Request $r)
    {
        $satker = getSatker();
        // dd($satker);
        $anggaran = AnggaranTahun::updateOrCreate([
            'user_id' => $satker, 'tahun' => date('Y')
        ]);

        for ($i=1; $i <= 4 ; $i++) { 
            $anggaranTriwulan[$i] = AnggaranTriwulan::updateOrCreate([
                'user_id' => $satker,
                'anggaran_tahun_id' => $anggaran->id,
                'triwulan' => $i
            ]);

            $reportAssesment[$i] = ReportAssessment::updateOrCreate([
                'daftarindikator_id' => 2,
                'persentase' => cekPersenSerapan($tahun = date('Y'), $daftar_iku = 2, $triwulan = $i)->nilai,
                'triwulan' => $i,
                'tahun' => date('Y'),
                'user_id' => $satker
            ]);
        }
        

        return view('monitoring.anggaran', compact('anggaran'));
    }

    //get
    public function ubah(Request $r)
    {

        // return getSatker();
        $satker = getSatker();

        $anggaran = AnggaranTahun::updateOrCreate([
            'user_id' => $satker, 'tahun' => date('Y')
        ]);

        //Cek Persen
        for ($triwulan = 1; $triwulan <= 4; $triwulan++){
            $persen[$triwulan] = Persentase::updateOrCreate([
                'daftarindikator_id' => 2,
                'tahun' => date('Y'),
                'triwulan' => $triwulan
            ]);

            $iku[$triwulan] = Iku::updateOrCreate([
                'daftarindikator_id' => $persen[$triwulan]->daftar_indikator->id,
                'tahun' => $persen[$triwulan]->tahun,
                'namaprogram' => str_slug($persen[$triwulan]->daftar_indikator->name, '_') . '#' . $persen[$triwulan]->tahun . '#' . $persen[$triwulan]->triwulan,
                'persen_id' => $persen[$triwulan]->id
            ]);

            $alatUkur[$triwulan] = AlatUkur::updateOrCreate([
                'iku_id' => $iku[$triwulan]->id,
                'name' => $iku[$triwulan]->namaprogram
            ]);

            $jumlahDefinisi[$triwulan] = count($alatUkur[$triwulan]->definisi);
            if ($jumlahDefinisi[$triwulan] < 6) {
                for ($i=1; $i <= (6 - $jumlahDefinisi[$triwulan]); $i++) { 
                    $definisiNilai[$triwulan][$i] = DefinisiNilai::create([
                        'iku_id' => $iku[$triwulan]->id,
                        'alatukur_id' => $alatUkur[$triwulan]->id,
                        'triwulan' => $persen[$triwulan]->triwulan,
                        'tahun' => $persen[$triwulan]->tahun
                    ]);
                }
            }

            //Report
            
        }

        $target = Persentase::with('iku.alat_ukur.definisi')->where('tahun', date('Y'))
                ->where('daftarindikator_id', 2)
                ->get();

        $rencana = AnggaranTriwulan::where('user_id', $satker)
                        ->where('anggaran_tahun_id', $anggaran->id)
                        ->get();
        // return $target;

        return view('monitoring.ubah', compact('anggaran', 'target', 'rencana'));
    }

    public function ubahTotal(Request $r)
    {
        $resp = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        $satker = getSatker();
        $tahunAnggaran = AnggaranTahun::where('tahun', date('Y'))
                        ->where('user_id', $satker)
                        ->first();
        if (!$tahunAnggaran) {
            $tahunAnggaran = new AnggaranTahun();
        }
        $tahunAnggaran->total_anggaran = preg_replace("/[^0-9]/","", $r->anggaran);
        // return $tahunAnggaran->total_anggaran;
        $tahunAnggaran->status = 1;
        $tahunAnggaran->save();

        $resp['status'] = true;
        $resp['data'] = $tahunAnggaran;

        return response()->json($resp, 200);
    }

    public function ubahAnggaran(Request $r)
    {
        // dd(request()->files[0]);
        $a = collect(request()->files);
        $satker = getSatker();

        $iku = \App\Iku::where(
            'namaprogram',
            'serapan_anggaran#' .
            date('Y') . '#' .
            cekCurrentTriwulan()['current']->triwulan
        )->first();

        $alatUkur = \App\AlatUkur::where(
            'name',
            'serapan_anggaran#' .
            date('Y') . '#' .
            cekCurrentTriwulan()['current']->triwulan
        )->first();

        $tahunAnggaran = AnggaranTahun::where('tahun', date('Y'))
                        ->where('user_id', $satker)
                        ->first();

        $tmpNilai = 0;
        // dd((int) preg_replace("/[^0-9]/","", request('realisasi_' . '1')));
        for ($i=1; $i <= 4 ; $i++) {
            $tmpNilai += (int) preg_replace("/[^0-9]/","", request('rencana_' . $i));
        }

        if ($tmpNilai > $tahunAnggaran->total_anggaran) {
            Session::flash('msg', '<div class="alert alert-danger">Rencana Angaran Tidak boleh melebihi Total Anggaran Tahunan (' . $tahunAnggaran->total_anggaran . ')</div>');
            return redirect()->back();
        }

        for ($i=1; $i <= 4 ; $i++) {

            $realisasi[$i] = 0;
            $rencana[$i] = 0;
            if(null != request('realisasi_' . $i)) {
                $realisasi[$i] = preg_replace("/[^0-9]/","", request('realisasi_' . $i));
            }

            if(null != request('rencana_' . $i)) {
                $rencana[$i] = preg_replace("/[^0-9]/","", request('rencana_' . $i));
            }

            $existingRealisasi = AnggaranTriwulan::where('user_id', $satker)
                ->where('anggaran_tahun_id',  $tahunAnggaran->id)
                ->sum('realisasi');

            // dd($existingRealisasi);
            if($existingRealisasi + $realisasi[$i] > $tahunAnggaran->total_anggaran) {
                Session::flash('msg', '<div class="alert alert-danger">Realisasi Angaran Tidak boleh melebihi atau kurang dari Total Anggaran Tahunan (' . $tahunAnggaran->total_anggaran . ')</div>');
                return redirect()->back();
            }

            $anggaranTriwulan[$i] = AnggaranTriwulan::updateOrCreate(
                [
                    'user_id' => $satker,
                    'anggaran_tahun_id' => $tahunAnggaran->id,
                    'triwulan' => cekCurrentTriwulan()['current']->triwulan
                ],
                [
                    'rencana' => $rencana[$i],
                    'realisasi' => $realisasi[$i]
                ]
            );

            if ($realisasi[$i] > 0) {
                //REPORT
                if (null != $r->final AND preg_replace("/[^0-9]/","", request('realisasi_' . $i)) > 0) {
                    $reportAssesment[$i] = ReportAssessment::updateOrCreate(
                        [
                            'daftarindikator_id' => 2,
                            'persentase' => cekPersenSerapan($tahun = date('Y'), $daftar_iku = 2, $triwulan = $i)->nilai,
                            'triwulan' => $i,
                            'tahun' => date('Y'),
                            'user_id' => $satker
                        ],
                        [
                            'final_status' => 1
                        ]
                    );

                    $selfAssesment[$i] = \App\SelfAssesment::updateOrCreate(
                        [
                            'user_id' => getSatker(),
                            'tahun' => date('Y'),
                            'triwulan' => $i,
                            'iku_id' => $iku->id,
                            'alatukur_id' => $alatUkur->id,
                            'definisinilai_id' => 0,
                            'filelampiran' => null,
                            'reportassesment_id' => $reportAssesment[$i]->id
                        ]
                    );

                    $agt = \App\AnggaranTriwulan::where('user_id', getSatker())
                        ->where('anggaran_tahun_id', $tahunAnggaran->id)
                        ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                        ->update(
                            ['is_final' => 1]
                        );

                    // $reportAssesment = ReportAssessment::updateOrCreate(
                    //     [
                    //         'daftarindikator_id' => 2,
                    //         'persentase' => cekPersenSerapan($tahun = date('Y'), $daftar_iku = 2, $triwulan = $i)->nilai,
                    //         'triwulan' => cekCurrentTriwulan()['current']->triwulan,
                    //         'tahun' => date('Y'),
                    //         'user_id' => $satker
                    //     ],
                    //     [
                    //         'final_status' => 1
                    //     ]
                    // );
                    // dd($selfAssesment[$i]);
                }
            }
        }

        if (AnggaranTriwulan::where('user_id', $satker)
            ->where('anggaran_tahun_id',  $tahunAnggaran->id)
            ->sum('rencana') != $tahunAnggaran->total_anggaran) {

            $ex = AnggaranTriwulan::where('user_id', $satker)
            ->where('anggaran_tahun_id',  $tahunAnggaran->id)
            ->update([
                'rencana' => 0
            ]);

            Session::flash('msg', '<div class="alert alert-danger">Realisasi Angaran Tidak boleh melebihi atau kurang dari Total Anggaran Tahunan (' . $tahunAnggaran->total_anggaran . ')</div>');
            return redirect()->back();
        }

        $fileName = null;
        // dd($a);

        foreach ($a as $i => $value) {
            // dd(explode('lampiran_', $i));
            //LAMPIRAN
            $allowedTipe = [
                'jpg', 'jpeg', 'zip', 'rar', 'pdf'
            ];

            $validFile = in_array(pathinfo($value->getClientOriginalName(), PATHINFO_EXTENSION), $allowedTipe);

            if (!$validFile) {
                Session::flash('msg', '<div class="alert alert-danger">File Lampiran hairs berupa file .zip, .rar, .jpg, .jpeg, atau .pdf</div>');
                return redirect()->back();
            }

            $fileName  = 'Lampiran_Anggaran_' . date('Y') . '_' . $i . '_' . $satker . '_';
            $fileName .= str_random(4) . '.';
            $fileName .= pathinfo($value->getClientOriginalName(), PATHINFO_EXTENSION);

            if(!$value->move(storage_path() . '/uploads/lampiran_anggaran/', $fileName)){
                return response()->json(['status' => false, 'data' => [], 'message' => 'Gagal mengupload']);
            }

            // $anggaranTriwulan[$i] = AnggaranTriwulan::updateOrCreate(
            //     [
            //         'user_id' => $satker,
            //         'anggaran_tahun_id' => $tahunAnggaran->id,
            //         'triwulan' => explode('lampiran_', $i)[1]
            //     ],
            //     [ 
            //         'file' => $fileName
            //     ]
            // );
            $anggaranTriwulan[$i] = AnggaranTriwulan::where('user_id', $satker)
                    ->where('anggaran_tahun_id', $tahunAnggaran->id)
                    ->where('triwulan', explode('lampiran_', $i)[1])
                    ->first();

            if (Storage::disk('lampiran_anggaran')->has($anggaranTriwulan[$i]->file)) {
                Storage::disk('lampiran_anggaran')->delete($anggaranTriwulan[$i]->file);
            }

            $anggaranTriwulan[$i]->file = $fileName;
            $anggaranTriwulan[$i]->save();

        }

        

        Session::flash('msg', '<div class="alert alert-success">Berhasil menyimpan</div>');
        return redirect()->back();
    }

    public function submit(Request $r)
    {
        // dd(request()->files[0]);
        $a = collect(request()->files);
        $satker = getSatker();

        $iku = \App\Iku::where(
            'namaprogram',
            'serapan_anggaran#' .
            date('Y') . '#' .
            cekCurrentTriwulan()['current']->triwulan
        )->first();

        $alatUkur = \App\AlatUkur::where(
            'name',
            'serapan_anggaran#' .
            date('Y') . '#' .
            cekCurrentTriwulan()['current']->triwulan
        )->first();

        $tahunAnggaran = AnggaranTahun::where('tahun', date('Y'))
                        ->where('user_id', $satker)
                        ->first();

        $tmpNilai = 0;
        // dd((int) preg_replace("/[^0-9]/","", request('realisasi_' . '1')));
        for ($i=1; $i <= 4 ; $i++) {
            $tmpNilai += (int) preg_replace("/[^0-9]/","", request('rencana_' . $i));
        }

            


        if ($tmpNilai > $tahunAnggaran->total_anggaran) {
            Session::flash('msg', '<div class="alert alert-danger">Rencana Angaran Tidak boleh melebihi Total Anggaran Tahunan (' . $tahunAnggaran->total_anggaran . ')</div>');
            return redirect()->back();
        }

        for ($i=1; $i <= 4 ; $i++) {

            $realisasi[$i] = 0;
            $rencana[$i] = 0;
            if(null != request('realisasi_' . $i)) {
                $realisasi[$i] = preg_replace("/[^0-9]/","", request('realisasi_' . $i));
            }

            if(null != request('rencana_' . $i)) {
                $rencana[$i] = preg_replace("/[^0-9]/","", request('rencana_' . $i));
            }

            $existingRealisasi = AnggaranTriwulan::where('user_id', $satker)
                ->where('anggaran_tahun_id',  $tahunAnggaran->id)
                ->sum('realisasi');

            if($existingRealisasi + $realisasi[$i] > $tahunAnggaran->total_anggaran) {

                Session::flash('msg', '<div class="alert alert-danger">Realisasi Angaran Tidak boleh melebihi atau kurang dari Total Anggaran Tahunan (' . $tahunAnggaran->total_anggaran . ')</div>');
                return redirect()->back();
            }

            $anggaranTriwulan[$i] = AnggaranTriwulan::updateOrCreate(
                [
                    'user_id' => $satker,
                    'anggaran_tahun_id' => $tahunAnggaran->id,
                    'triwulan' => cekCurrentTriwulan()['current']->triwulan
                ],
                [
                    'rencana' => $rencana[$i],
                    'realisasi' => $realisasi[$i]
                ]
            );

            if ($realisasi[$i] > 0) {
                //REPORT
                if (preg_replace("/[^0-9]/","", request('realisasi_' . $i)) > 0) {
                    // $reportAssesment[$i] = ReportAssessment::updateOrCreate(
                    //     [
                    //         'daftarindikator_id' => 2,
                    //         'persentase' => cekPersenSerapan($tahun = date('Y'), $daftar_iku = 2, $triwulan = $i)->nilai,
                    //         'triwulan' => $i,
                    //         'tahun' => date('Y'),
                    //         'user_id' => $satker
                    //     ]
                    // );

                    

                    $agt = \App\AnggaranTriwulan::where('user_id', getSatker())
                        ->where('anggaran_tahun_id', $tahunAnggaran->id)
                        ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                        ->update(
                            ['is_final' => 1]
                        );


                    $hasill[$i] = (hitungNilaiSerapan(date('Y'), $i, Auth::user()->id) / 6) * cekPersenSerapan(date('Y'), 2, $i)->nilai;
                    // $hasill[$i] = ;

                    $reportAssesment[$i] = ReportAssessment::updateOrCreate(
                        [
                            'daftarindikator_id' => 2,
                            'persentase' => cekPersenSerapan($tahun = date('Y'), $daftar_iku = 2, $triwulan = $i)->nilai,
                            'triwulan' => $i,
                            'tahun' => date('Y'),
                            'user_id' => $satker
                        ],
                        [
                            'hasil' => $hasill[$i],
                            'nilai' => hitungNilaiSerapan(date('Y'), $i, Auth::user()->id)
                        ]
                    );

                    $selfAssesment[$i] = \App\SelfAssesment::updateOrCreate(
                        [
                            'user_id' => getSatker(),
                            'tahun' => date('Y'),
                            'triwulan' => $i,
                            'iku_id' => $iku->id,
                            'alatukur_id' => $alatUkur->id,
                            'definisinilai_id' => 0,
                            'filelampiran' => null,
                            'reportassesment_id' => $reportAssesment[$i]->id
                        ]
                    );

                    // dd($selfAssesment[$i]);
                    // dd($selfAssesment[$i]);
                }
            }
        }

        if (AnggaranTriwulan::where('user_id', $satker)
            ->where('anggaran_tahun_id',  $tahunAnggaran->id)
            ->sum('rencana') != $tahunAnggaran->total_anggaran) {

            $ex = AnggaranTriwulan::where('user_id', $satker)
            ->where('anggaran_tahun_id',  $tahunAnggaran->id)
            ->update([
                'rencana' => 0
            ]);

            Session::flash('msg', '<div class="alert alert-danger">Realisasi Angaran Tidak boleh melebihi atau kurang dari Total Anggaran Tahunan (' . $tahunAnggaran->total_anggaran . ')</div>');
            return redirect()->back();
        }

        $fileName = null;
        // dd($a);

        foreach ($a as $i => $value) {
            // dd(explode('lampiran_', $i));
            //LAMPIRAN
            $allowedTipe = [
                'jpg', 'jpeg', 'zip', 'rar', 'pdf'
            ];

            $validFile = in_array(pathinfo($value->getClientOriginalName(), PATHINFO_EXTENSION), $allowedTipe);

            if (!$validFile) {
                Session::flash('msg', '<div class="alert alert-danger">File Lampiran hairs berupa file .zip, .rar, .jpg, .jpeg, atau .pdf</div>');
                return redirect()->back();
            }

            $fileName  = 'Lampiran_Anggaran_' . date('Y') . '_' . $i . '_' . $satker . '_';
            $fileName .= str_random(4) . '.';
            $fileName .= pathinfo($value->getClientOriginalName(), PATHINFO_EXTENSION);

            if(!$value->move(storage_path() . '/uploads/lampiran_anggaran/', $fileName)){
                return response()->json(['status' => false, 'data' => [], 'message' => 'Gagal mengupload']);
            }

            // $anggaranTriwulan[$i] = AnggaranTriwulan::updateOrCreate(
            //     [
            //         'user_id' => $satker,
            //         'anggaran_tahun_id' => $tahunAnggaran->id,
            //         'triwulan' => explode('lampiran_', $i)[1]
            //     ],
            //     [ 
            //         'file' => $fileName
            //     ]
            // );
            $anggaranTriwulan[$i] = AnggaranTriwulan::where('user_id', $satker)
                    ->where('anggaran_tahun_id', $tahunAnggaran->id)
                    ->where('triwulan', explode('lampiran_', $i)[1])
                    ->first();

            if (Storage::disk('lampiran_anggaran')->has($anggaranTriwulan[$i]->file)) {
                Storage::disk('lampiran_anggaran')->delete($anggaranTriwulan[$i]->file);
            }

            $anggaranTriwulan[$i]->file = $fileName;
            $anggaranTriwulan[$i]->save();

        }

        

        Session::flash('msg', '<div class="alert alert-success">Berhasil menyimpan</div>');
        return redirect()->back();
    }


    public function ubahAnggaran2(Request $r)
    {

        $a = collect(request()->files);
        $satker = getSatker();
        $tahunAnggaran = AnggaranTahun::where('tahun', date('Y'))
                        ->where('user_id', $satker)
                        ->first();

        $tmpNilai = 0;
        // dd((int) preg_replace("/[^0-9]/","", request('realisasi_' . '1')));
        for ($i=1; $i <= 4 ; $i++) {
            $tmpNilai += (int) preg_replace("/[^0-9]/","", request('rencana_' . $i));
        }

        if ($tmpNilai > $tahunAnggaran->total_anggaran) {
            Session::flash('msg', '<div class="alert alert-danger">Rencana Angaran Tidak boleh melebihi Total Anggaran Tahunan (' . $tahunAnggaran->total_anggaran . ')</div>');
            return redirect()->back();
        }

        for ($i=1; $i <= 4 ; $i++) {

            $realisasi[$i] = 0;
            $rencana[$i] = 0;
            if(null != request('realisasi_' . $i)) {
                $realisasi[$i] = preg_replace("/[^0-9]/","", request('realisasi_' . $i));
            }

            if(null != request('rencana_' . $i)) {
                $rencana[$i] = preg_replace("/[^0-9]/","", request('rencana_' . $i));
            }            

            $anggaranTriwulan[$i] = AnggaranTriwulan::updateOrCreate(
                [
                    'user_id' => $satker,
                    'anggaran_tahun_id' => $tahunAnggaran->id,
                    'triwulan' => $i
                ],
                [
                    'rencana' => $rencana[$i],
                    'realisasi' => $realisasi[$i]
                ]
            );

            if ($realisasi[$i] > 0) {
                //REPORT
                if (null != $r->final AND preg_replace("/[^0-9]/","", request('realisasi_' . $i)) > 0) {
                    $reportAssesment = ReportAssessment::updateOrCreate(
                        [
                            'daftarindikator_id' => 2,
                            'persentase' => cekPersenSerapan($tahun = date('Y'), $daftar_iku = 2, $triwulan = $i)->nilai,
                            'triwulan' => $i,
                            'tahun' => date('Y'),
                            'user_id' => $satker
                        ],
                        [
                            'final_status' => 1
                        ]
                    );
                }
            }
        }

        $fileName = null;

        foreach ($a as $i => $value) {
            // dd(explode('lampiran_', $i));
            //LAMPIRAN
            $allowedTipe = [
                'jpg', 'jpeg', 'zip', 'rar', 'pdf'
            ];

            $validFile = in_array(pathinfo($value->getClientOriginalName(), PATHINFO_EXTENSION), $allowedTipe);

            if (!$validFile) {
                Session::flash('msg', '<div class="alert alert-danger">File Lampiran hairs berupa file .zip, .rar, .jpg, .jpeg, atau .pdf</div>');
                return redirect()->back();
            }

            $fileName  = 'Lampiran_Anggaran_' . date('Y') . '_' . $i . '_' . $satker . '_';
            $fileName .= str_random(4) . '.';
            $fileName .= pathinfo($value->getClientOriginalName(), PATHINFO_EXTENSION);

            if(!$value->move(storage_path() . '/uploads/lampiran_anggaran/', $fileName)){
                return response()->json(['status' => false, 'data' => [], 'message' => 'Gagal mengupload']);
            }

            // $anggaranTriwulan[$i] = AnggaranTriwulan::updateOrCreate(
            //     [
            //         'user_id' => $satker,
            //         'anggaran_tahun_id' => $tahunAnggaran->id,
            //         'triwulan' => explode('lampiran_', $i)[1]
            //     ],
            //     [ 
            //         'file' => $fileName
            //     ]
            // );
            $anggaranTriwulan[$i] = AnggaranTriwulan::where('user_id', $satker)
                    ->where('anggaran_tahun_id', $tahunAnggaran->id)
                    ->where('triwulan', explode('lampiran_', $i)[1])
                    ->first();
            if (Storage::disk('lampiran_anggaran')->has($anggaranTriwulan[$i]->file)) {
                Storage::disk('lampiran_anggaran')->delete($anggaranTriwulan[$i]->file);
            }

            $anggaranTriwulan[$i]->file = $fileName;
            $anggaranTriwulan[$i]->save();
        }

        Session::flash('msg', '<div class="alert alert-success">Berhasil menyimpan</div>');
        return redirect()->back();
    }
}
