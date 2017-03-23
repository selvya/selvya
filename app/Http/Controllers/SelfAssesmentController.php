<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hashids;
use Validator;
use Session;
use Carbon\Carbon;
use \App\ReportAssessment;
use Auth;
use \App\Iku;
use \App\AlatUkur;
use \App\AnggaranTahun;
use \App\AnggaranTriwulan;
use \App\Persentase;
use \App\DefinisiNilai;
use \App\SelfAssesment;
use \App\StakeHolder;
use \App\ProgramBudaya;

class SelfAssesmentController extends Controller {
    //

    public function __construct() {

    }


    /**
     * Memeriksa nilai kecepatan pelaporan.
     *
     * @param  Illuminate\Http\Request  $r
     * @return json
     */
    public function cekSimpanPelaporan(Request $r) {

        $nilai = 1;

        $now = Carbon::now();
        //!!!!!!!
        $data = $this->setSatker(2, 2, $now);
        $batas = getBatasTanggalPelaporan(date('Y'), $data['triwulan']);
        $persen = cekPersenLaporan(date('Y'), 1, $data['triwulan']);
        $iku = cekIkuPelaporan($now->year, $data['triwulan']);

        // return $batas;
        //Ubah menjadi request atau parameter
        // $tanggalKirim = Carbon::parse('2017-06-13');

        //Tanggal tidak ada atau tidak valid
        if (! isset($tanggalKirim) OR $tanggalKirim == null OR ! $tanggalKirim instanceof Carbon) {
            return $nilai;
        }

        //Tanggal Finalisasi sebelum batas
        if ($tanggalKirim < $batas->tanggal) {
            $nilai = 6;
            return $nilai;
        }

        // Finalisasi sama dengan batas
        if ($tanggalKirim == $batas->tanggal) {
            $nilai = 6;
            return $nilai;
        }        

        //FInalisasi lebih dari batas

        if ($tanggalKirim > $batas->tanggal) {

            if($batas->tanggal->diffInDays($tanggalKirim) == (int) $iku->alat_ukur[0]->definisi[5]->deskripsi) {
                $nilai = 6;
                return $nilai;
            }

            if ($batas->tanggal->diffInDays($tanggalKirim) == (int) $iku->alat_ukur[0]->definisi[4]->deskripsi) {
                $nilai = 5;
                return $nilai;
            }

            if ($batas->tanggal->diffInDays($tanggalKirim) == (int) $iku->alat_ukur[0]->definisi[3]->deskripsi) {
                $nilai = 4;
                return $nilai;
            }

            if ($batas->tanggal->diffInDays($tanggalKirim) == (int) $iku->alat_ukur[0]->definisi[2]->deskripsi) {
                $nilai = 3;
                return $nilai;
            }

            if ($batas->tanggal->diffInDays($tanggalKirim) >= (int) $iku->alat_ukur[0]->definisi[1]->deskripsi) {
                $nilai = 2;
                return $nilai;
            }
            // return 'hehe';
        }

        // echo "Kirim: $tanggalKirim <br>";
        // echo "Batas: $batas->tanggal <br>";
        // echo $tanggalKirim < $batas->tanggal;
        // echo $batas->tanggal->diffInDays($tanggalKirim) . '<br>';
        // echo $tanggalKirim->diffInDays($batas->tanggal);
    }

    public function pimpinanSimpan(Request $r)
    {
        $persen = \App\Persentase::where('tahun', date('Y'))
        ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
        ->where('daftarindikator_id', 4)
        ->first();
        // dd($r);

        $report = \App\ReportAssessment::updateOrCreate(
            [
                'triwulan'           => cekCurrentTriwulan()['current']->triwulan, 
                'tahun'              => date('Y'),
                'daftarindikator_id' => '4',
                'user_id'            => Auth::user()->id

            ],
            [
                'persentase' => $persen->nilai,
                'nilai' => $r->nilai,
                'hasil' => $r->nilai / 6 * $persen->nilai,
                // 'final_status' => 1,
                'partisipasi' => $r->partisipasi,
                'deskripsi' => $r->deskripsi
            ]
        );

        // dd($report);

        return redirect()->back();
    }


    /**
     * Memeriksa nilai serapan anggaran.
     *
     * @param  Illuminate\Http\Request  $r
     * @return json
     */
    public function cekSerapanAnggaran(Request $r) 
    {
        // $operator = [
        //     '>' => 'greaterthan',
        //     '>=' => 'greaterthanequals',
        //     '<' => 'lessthan',
        //     '<=' => 'lessthanequals'
        // ];
        $nilai = 1;

        $tahun = date('Y');
        $triwulan = cekCurrentTriwulan()['triwulan'];
        dd($triwulan);

        $persen = cekPersenSerapan($tahun, 2, 1);

        $iku = cekIkuSerapan($tahun, 1);

        $totalAnggaran = (int) 100000000;

        $realisasi = 10000000;

        $targetPersen = (float) getPercentOfNumber($totalAnggaran, $iku->alat_ukur[0]->definisi[5]->deskripsi);
        // return number_format($targetPersen, 2);
        
        //Tidak melapor
        if (! isset($realisasi) OR $realisasi == null) {
            return $nilai;
        }

        if ($realisasi <= (float) getPercentOfNumber($totalAnggaran, $iku->alat_ukur[0]->definisi[1]->deskripsi)) {
            $nilai = 2;
            return $nilai;
        }

        if ($realisasi > (float) getPercentOfNumber($totalAnggaran, $iku->alat_ukur[0]->definisi[2]->deskripsi) AND $realisasi <= (float) getPercentOfNumber($totalAnggaran, $iku->alat_ukur[0]->definisi[3]->deskripsi)) {
            $nilai = 3;
            return $nilai;
        }

        if ($realisasi > (float) getPercentOfNumber($totalAnggaran, $iku->alat_ukur[0]->definisi[3]->deskripsi) AND $realisasi <= (float) getPercentOfNumber($totalAnggaran, $iku->alat_ukur[0]->definisi[4]->deskripsi)) {
            $nilai = 4;
            return $nilai;
        }

        if ($realisasi > (float) getPercentOfNumber($totalAnggaran, $iku->alat_ukur[0]->definisi[4]->deskripsi) AND $realisasi < (float) getPercentOfNumber($totalAnggaran, $iku->alat_ukur[0]->definisi[5]->deskripsi)) {
            $nilai = 5;
            return $nilai;
        }

        if ($realisasi >= (float) getPercentOfNumber($totalAnggaran, $iku->alat_ukur[0]->definisi[5]->deskripsi)) {
            $nilai = 6;
            return $nilai;
        }

        
        // return (float) $iku->alat_ukur[0]->definisi[1]->deskripsi;
        // return number_format($totalAnggaran);
    }

    public function pelaporanSimpan(Request $r)
    {
        $iku = \App\Iku::where(
            'namaprogram',
            'kecepatan_pelaporan#' .
            date('Y') . '#' .
            cekCurrentTriwulan()['current']->triwulan
            )->first();

        $alatUkur = \App\AlatUkur::where(
            'name',
            'kecepatan_pelaporan#' .
            date('Y') . '#' .
            cekCurrentTriwulan()['current']->triwulan
            )->first();

        $rep = \App\ReportAssessment::where('tahun', date('Y'))
            ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
            ->where('user_id', getSatker())
            ->where('daftarindikator_id', 1)
            ->first();

        if (count($rep) > 0) {
            $rep = \Carbon\Carbon::parse($rep->updated_at);
        }else{
            $rep = \Carbon\Carbon::now();
        }
        
        $nilai = (int) cekSimpanPelaporan($rep);

        // dd($rep);
                //FINISKAN ANGGARAN, PARTISIPASI PIMPINAN, DAN BUDAYA DISINI
                //Finiskan Anggaran
                $tahunAnggaran = AnggaranTahun::where('tahun', date('Y'))
                                ->where('user_id', getSatker())
                                ->first();
                $agt = \App\AnggaranTriwulan::where('user_id', getSatker())
                    ->where('anggaran_tahun_id', $tahunAnggaran->id)
                    ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                    ->update(
                        ['is_final' => 1]
                    );

                $persenAnggaran = \App\Persentase::where('tahun', date('Y'))
                    ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                    ->where('daftarindikator_id', 2)
                    ->first();
                $niAnggaran =  hitungNilaiSerapan(date('Y'), cekCurrentTriwulan()['current']->triwulan, getSatker());
                $report = \App\ReportAssessment::updateOrCreate(
                    [
                        'triwulan'           => cekCurrentTriwulan()['current']->triwulan, 
                        'tahun'              => date('Y'),
                        'daftarindikator_id' => 2,
                        'user_id'            => Auth::user()->id

                    ],
                    [
                        'persentase' => $persenAnggaran->nilai,
                        'nilai' => $niAnggaran,
                        'hasil' => $niAnggaran / 6 * $persenAnggaran->nilai,
                        'final_status' => 1
                    ]
                );

                //Finish pimpinan
                $persenPimpinan = \App\Persentase::where('tahun', date('Y'))
                    ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                    ->where('daftarindikator_id', 4)
                    ->first();
                $report = \App\ReportAssessment::updateOrCreate(
                    [
                        'triwulan'           => cekCurrentTriwulan()['current']->triwulan, 
                        'tahun'              => date('Y'),
                        'daftarindikator_id' => '4',
                        'user_id'            => Auth::user()->id

                    ],
                    [
                        'persentase' => $persenPimpinan->nilai,
                        // 'nilai' => $r->nilai,
                        'final_status' => 1,
                        'partisipasi' => $r->partisipasi,
                        'deskripsi' => $r->deskripsi
                    ]
                );

                //FINISH Program Budaya
                $persenBud = \App\Persentase::where('tahun', date('Y'))
                    ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                    ->where('daftarindikator_id', 3)
                    ->first();

                  $budaya = \App\ReportAssessment::where('tahun', date('Y'))
                          ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                          ->where('user_id', getSatker())
                          ->where('daftarindikator_id','3')
                          ->update(
                                [
                                    'final_status' => 1,
                                    'persentase' => $persenBud->nilai
                                ]
                            );


        $persenLap = \App\Persentase::where('tahun', date('Y'))
                    ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                    ->where('daftarindikator_id', 1)
                    ->first();
        $newRep = \App\ReportAssessment::updateOrCreate(
            [
                'tahun' => date('Y'),
                'triwulan' => cekCurrentTriwulan()['current']->triwulan,
                'user_id' => getSatker(),
                'daftarindikator_id' => 1,
            ],
            [
                'nilai' => $nilai,
                'hasil' => $nilai / 6 * $persenLap->nilai,
                'updated_at' => \Carbon\Carbon::now(),
                'final_status' => 1
            ]
        );

        // dd($newRep);


        //
        $getAll = \App\ReportAssessment::where('tahun', date('Y'))
                ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                ->where('user_id', getSatker())
                ->sum('hasil');
        // dd($getAll);
        $hAAAA = \App\NilaiAkhir::updateOrCreate(
            [
                'user_id' => getSatker(),
                'triwulan' => cekCurrentTriwulan()['current']->triwulan,
                'tahun' => date('Y'),
            ],
            ['nilai' => $getAll]
        );

        return redirect()->back();
    }


    //DUMMY SETTtanggalKirimER
    public function setSatker($id = 1, $triwulan = 1, $tanggal = null) {
        $data = [
        'satker' => $id,
        'triwulan' => $triwulan,
        'tanggal' => $tanggal
        ];

        return $data;
    }

    public function lembarassesment()
    {   
        $triwulan = cekCurrentTriwulan();
        $report = ReportAssessment::updateOrCreate([
            'triwulan'           => $triwulan['current']['triwulan'], 
            'tahun'              => date('Y'),
            'daftarindikator_id' => '3',
            'user_id'            => Auth::user()->id
        ]);

        $reportall = ReportAssessment::where('triwulan',$triwulan['current']['triwulan'])
        ->where('tahun',date('Y'))
        ->where('user_id',Auth::user()->id)
        ->where('daftarindikator_id','3')
        ->get();

        // dd(count($reportall));

        #Ambil Persen tahun ini
        $jumlahPersen = \App\Persentase::where('tahun', date('Y'))
                    ->where('triwulan', $triwulan['current']->triwulan)
                    ->where('nilai', '!=', 0)
                    ->get();

        return view('assesment.lembar',compact('report','triwulan','reportall', 'jumlahPersen'));
    }

    public function arsipassesment()
    {
        $triwulan = cekCurrentTriwulan();
        $arsip = \App\ReportAssessment::where('user_id',Auth::user()->id)->where('final_status','1')->paginate(10);

        return view('assesment.arsip', compact('arsip','triwulan'));
    }

    public function programbudaya($id)
    {
        $triwulan = cekCurrentTriwulan();

        $inovatif = Iku::where('tahun',date('Y'))
        ->where('satker', Auth::user()->id)
        ->where('daftarindikator_id','3')
        ->first();

        if ($inovatif == null) {
            return redirect(url('inovatif'))->with('warning', 'Anda harus menambahkan program ojk inovatif terlebih dahulu');
        }


        $peduli = Iku::where('tahun',date('Y'))
        ->where('namaprogram','pelaksanaan_program_budaya#' . date('Y') .'#' . $triwulan['current']['triwulan'] .'#ojk_peduli')->first();

        $melayani = Iku::where('tahun',date('Y'))
        ->where('namaprogram','pelaksanaan_program_budaya#' . date('Y') .'#' . $triwulan['current']['triwulan'] .'#ojk_melayani')->first();

        if (($peduli == null) || ($inovatif == null) || ($melayani == null)) {
            return redirect()->back()->with('warning', 'Data masih belum di masukan oleh admin');
        }

        $alatino = AlatUkur::where('iku_id',$inovatif->id)->get();
        $alatpeduli = AlatUkur::where('iku_id',$peduli->id)->get();
        $alatmelayani = AlatUkur::where('iku_id',$melayani->id)->get();


        $persen = \App\Persentase::where('tahun',date('Y'))
        ->where('triwulan',$triwulan['current']['triwulan'])
        ->where('daftarindikator_id','3')->first();

        $anggaran = \App\Iku::where(
            'iku.namaprogram',
            'serapan_anggaran' .
            '#' . date('Y') .
            '#' . $triwulan['current']['triwulan']
            )
        ->where('iku.daftarindikator_id','2')
        ->join('persentase', 'iku.persen_id' ,'=','persentase.id')
        ->first();

        $pimpinan = \App\Iku::where(
            'iku.namaprogram',
            'partisipasi_pimpinan'.
            '#' . date('Y') .
            '#' . $triwulan['current']['triwulan']
            )
        ->where('iku.daftarindikator_id','4')
        ->join('persentase', 'iku.persen_id' ,'=','persentase.id')
        ->first();

        $pelaporan = \App\Iku::where('iku.namaprogram',
            'kecepatan_pelaporan' .
            '#' . date('Y') .
            '#' . $triwulan['current']['triwulan']
            )
        ->where('iku.daftarindikator_id','1')
        ->join('persentase', 'iku.persen_id' ,'=','persentase.id')
        ->first();

        $reportall = ReportAssessment::where('triwulan',$triwulan['current']['triwulan'])
        ->where('tahun',date('Y'))
        ->where('daftarindikator_id','3')
        ->where('user_id',Auth::user()->id)
        ->get();

        $satker = getSatker();
        // dd($satker);
        $anggaranN = AnggaranTahun::updateOrCreate([
            'user_id' => $satker, 'tahun' => date('Y')
        ]);

        for ($i=1; $i <= 4 ; $i++) { 
            $anggaranTriwulanN[$i] = AnggaranTriwulan::updateOrCreate([
                'user_id' => $satker,
                'anggaran_tahun_id' => $anggaranN->id,
                'triwulan' => $i
            ]);

            $reportAssesmentN[$i] = ReportAssessment::updateOrCreate([
                'daftarindikator_id' => 2,
                'persentase' => cekPersenSerapan($tahun = date('Y'), $daftar_iku = 2, $triwulan = $i)->nilai,
                'triwulan' => $i,
                'tahun' => date('Y'),
                'user_id' => $satker
            ]);
        }

        return view('assesment.programbudaya', compact('peduli','melayani','inovatif','alatino','alatpeduli','alatmelayani','persen','anggaran','pimpinan','pelaporan','reportall'));
    }

    public function serapananggaran($id)
    { 
        // dd(getSatker());
        $triwulan = cekCurrentTriwulan();

        $inovatif = Iku::where('tahun',date('Y'))
        ->where('satker', Auth::user()->id)
        ->where('daftarindikator_id','3')
        ->first();

        $peduli = Iku::where('tahun',date('Y'))
        ->where('namaprogram','pelaksanaan_program_budaya'.'#'.date('Y').'#'.$triwulan['current']['triwulan'].'#ojk_peduli')
        ->first();

        $melayani = Iku::where('tahun',date('Y'))
        ->where('namaprogram','pelaksanaan_program_budaya'.'#'.date('Y').'#'.$triwulan['current']['triwulan'].'#ojk_melayani')
        ->first();

        $persen = \App\Persentase::where('tahun',date('Y'))
        ->where('triwulan',$triwulan['current']['triwulan'])
        ->where('daftarindikator_id','3')->first();

        $anggaran = \App\Iku::where('iku.namaprogram','serapan_anggaran'.'#'.date('Y').'#'.$triwulan['current']['triwulan'])
        ->where('iku.daftarindikator_id','2')
        ->join('persentase', 'iku.persen_id' ,'=','persentase.id')
        ->first();

        $pimpinan = \App\Iku::where('iku.namaprogram','partisipasi_pimpinan'.'#'.date('Y').'#'.$triwulan['current']['triwulan'])
        ->where('iku.daftarindikator_id','4')
        ->join('persentase', 'iku.persen_id' ,'=','persentase.id')
        ->first();

        $pelaporan = \App\Iku::where('iku.namaprogram','kecepatan_pelaporan'.'#'.date('Y').'#'.$triwulan['current']['triwulan'])
        ->where('iku.daftarindikator_id','1')
        ->join('persentase', 'iku.persen_id' ,'=','persentase.id')
        ->first(); 

             //----------
             //-----------
        $satker = getSatker();

        $anggaranN = AnggaranTahun::updateOrCreate(
            ['user_id' => $satker, 'tahun' => date('Y')]
            );

        //Cek Persen
        for ($tw = 1; $tw <= 4; $tw++){
            $persen[$tw] = Persentase::updateOrCreate([
                'daftarindikator_id' => 2,
                'tahun' => date('Y'),
                'triwulan' => $tw
                ]);

            $iku[$tw] = Iku::updateOrCreate([
                'daftarindikator_id' => $persen[$tw]->daftar_indikator->id,
                'tahun' => $persen[$tw]->tahun,
                'namaprogram' => str_slug($persen[$tw]->daftar_indikator->name, '_') . '#' . $persen[$tw]->tahun . '#' . $persen[$tw]->triwulan,
                'persen_id' => $persen[$tw]->id
                ]);

            $alatUkur[$tw] = AlatUkur::updateOrCreate([
                'iku_id' => $iku[$tw]->id,
                'name' => $iku[$tw]->namaprogram
                ]);

            $jumlahDefinisi[$tw] = count($alatUkur[$tw]->definisi);
            if ($jumlahDefinisi[$tw] < 6) {
                for ($i=1; $i <= (6 - $jumlahDefinisi[$tw]); $i++) { 
                    $definisiNilai[$tw][$i] = DefinisiNilai::create([
                        'iku_id' => $iku[$tw]->id,
                        'alatukur_id' => $alatUkur[$tw]->id,
                        'triwulan' => $persen[$tw]->triwulan,
                        'tahun' => $persen[$tw]->tahun
                        ]);
                }
            }

        }

        $targetN = Persentase::with('iku.alat_ukur.definisi')->where('tahun', date('Y'))
        ->where('daftarindikator_id', 2)
        ->get();

        $rencanaN = AnggaranTriwulan::where('user_id', $satker)
        ->where('anggaran_tahun_id', $anggaranN->id)
        ->get();

        // $atasWizard = (hitungNilaiSerapan(date('Y'), cekCurrentTriwulan()['current']->triwulan, Auth::user()->id) / 6) * cekPersenSerapan(date('Y'), 2, cekCurrentTriwulan()['current']->triwulan)->nilai;
        $agg = AnggaranTahun::where('tahun', date('Y'))
                ->where('user_id', getSatker())
                ->first()
                ->anggaran_triwulan
                ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                ->first();
        if ($agg->file != null) {
            $atasWizard = (hitungNilaiSerapan(date('Y'), cekCurrentTriwulan()['current']->triwulan, Auth::user()->id) / 6) * cekPersenSerapan(date('Y'), 2, cekCurrentTriwulan()['current']->triwulan)->nilai;
        }else{
            $atasWizard = 0;
        }
        
        for ($i=1; $i <= 4 ; $i++) { 
            $reportAssesment[$i] = ReportAssessment::updateOrCreate(
                [
                    'daftarindikator_id' => 2,
                    'triwulan' => $i,
                    'tahun' => date('Y'),
                    'user_id' => $satker
                ],
                [
                    'hasil' => $atasWizard,
                    'nilai' => hitungNilaiSerapan(date('Y'), $i, Auth::user()->id)
                ]
            );
        }


        // dd(hitungNilaiSerapan(date('Y'), $triwulan['current'], Auth::user()->id));
        
        // return $atasWizard;
        $warna = ReportAssessment::where('daftarindikator_id', 2)
        ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
        ->where('tahun', date('Y'))
        ->where('user_id', $satker)
        ->first()->hasil;
        
        if ($warna > 0) {
            $warna = 'ijo';
        }else{
            $warna = 'biru';
        }

        return view(
            'assesment.serapananggaran',
            compact(
                'anggaranN',
                'targetN',
                'rencanaN',
                'inovatif',
                'peduli',
                'melayani',
                'persen',
                'triwulan',
                'anggaran',
                'pimpinan',
                'pelaporan',
                'atasWizard',
                'warna'
                )
            );
    }

    public function pelaporan($id)
    {
        $triwulan = cekCurrentTriwulan();

        $inovatif = Iku::where('tahun',date('Y'))
        ->where('satker', Auth::user()->id)
        ->where('daftarindikator_id','3')
        ->first();

        $persen = \App\Persentase::where('tahun',date('Y'))
        ->where('triwulan',$triwulan['current']['triwulan'])
        ->where('daftarindikator_id','3')->first();

        $anggaran = \App\Iku::where(
            'iku.namaprogram','serapan_anggaran' .
            '#' . date('Y') .
            '#' . $triwulan['current']['triwulan']
            )
        ->where('iku.daftarindikator_id','2')
        ->join('persentase', 'iku.persen_id' ,'=','persentase.id')
        ->first();

        $pimpinan = \App\Iku::where(
            'iku.namaprogram',
            'partisipasi_pimpinan' .
            '#' . date('Y') .
            '#' . $triwulan['current']['triwulan']
            )
        ->where('iku.daftarindikator_id','4')
        ->join('persentase', 'iku.persen_id' ,'=','persentase.id')
        ->first();

        $pelaporan = \App\Iku::where(
            'iku.namaprogram',
            'kecepatan_pelaporan' .
            '#' . date('Y') .
            '#' . $triwulan['current']['triwulan']
            )
        ->where('iku.daftarindikator_id','1')
        ->join('persentase', 'iku.persen_id' ,'=','persentase.id')
        ->first(); 

        $agg = AnggaranTahun::where('tahun', date('Y'))
                ->where('user_id', getSatker())
                ->first()
                ->anggaran_triwulan
                ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                ->first();
        if ($agg->file != null) {
            $atasWizard = (hitungNilaiSerapan(date('Y'), cekCurrentTriwulan()['current']->triwulan, Auth::user()->id) / 6) * cekPersenSerapan(date('Y'), 2, cekCurrentTriwulan()['current']->triwulan)->nilai;
        }else{
            $atasWizard = 0;
        }
        
        return view('assesment.pelaporan', compact('inovatif','anggaran','pimpinan','pelaporan','persen', 'atasWizard'));
    }


    public function pimpinan($id)
    {
        $triwulan = cekCurrentTriwulan();

        $inovatif = Iku::where('tahun',date('Y'))
        ->where('satker', Auth::user()->id)
        ->where('daftarindikator_id','3')
        ->first();

        $persen = \App\Persentase::where('tahun',date('Y'))
        ->where('triwulan',$triwulan['current']['triwulan'])
        ->where('daftarindikator_id','3')->first();

        $anggaran = \App\Iku::where('iku.namaprogram','serapan_anggaran'.'#'.date('Y').'#'.$triwulan['current']['triwulan'])
        ->where('iku.daftarindikator_id','2')
        ->join('persentase', 'iku.persen_id' ,'=','persentase.id')
        ->first();

        $pimpinan = \App\Iku::where('iku.namaprogram','partisipasi_pimpinan'.'#'.date('Y').'#'.$triwulan['current']['triwulan'])
        ->where('iku.daftarindikator_id','4')
        ->join('persentase', 'iku.persen_id' ,'=','persentase.id')
        ->first();

        $pelaporan = \App\Iku::where('iku.namaprogram','kecepatan_pelaporan'.'#'.date('Y').'#'.$triwulan['current']['triwulan'])
        ->where('iku.daftarindikator_id','1')
        ->join('persentase', 'iku.persen_id' ,'=','persentase.id')
        ->first(); 

        return view('assesment.pimpinan', compact('inovatif','anggaran','pimpinan','pelaporan','persen'));
    }


    public function prosesprogrambudaya(Request $r)
    {
      $triwulan = cekCurrentTriwulan();

      // dd(request()->all());

      $validation = Validator::make($r->all(),[
        'report_id' => 'required'
        ]);

      if ($validation->fails()) {
        return redirect()->back();
    }

    $rid = Hashids::connection('report')->decode($r->report_id);
    if (count($rid) < 1) {
        return redirect()->back();
    }

    $nilaiino       = 0;
    $nilaipeduli    = 0;
    $nilaimelayani  = 0;

    foreach($r->alatukur_inovatif as $b => $data){

        $alat[$b] = collect(explode('#', $data));

        $iku_id[$b] = $alat[$b][0];
        $alat_id[$b] = $alat[$b][1];
        $def_id[$b] = $alat[$b][2];
        $nilai[$b] = $alat[$b][3];
        $isialat[$b] = SelfAssesment::updateOrCreate([
          'user_id'             => Auth::user()->id,
          'tahun'               => date('Y'),
          'triwulan'            => $triwulan['current']['triwulan'],
          'alatukur_id'         => $alat_id[$b]
          ],
          [
          'iku_id'              => $iku_id[$b],
          'definisinilai_id'    => $def_id[$b],
          'filelampiran'        => $r->file_melayani,
          'reportassesment_id'  => $rid[0],
          'skala_nilai'         => $nilai[$b],
          'filelampiran'        => $r->file_inovatif
          ]);
        $nilaiino += $nilai[$b];
    }

    if (null != $r->nilai_manual_peduli) {
        $alatnyapeduli_man = count($r->nilai_manual_peduli);

        foreach ($r->nilai_manual_peduli as $ped => $op) {

            $iku_id_peduli     = $r->iku_id_peduli_manual[$ped];
            $alat_id_peduli    = $r->alatukur_id_peduli_manual[$ped];
            $nilai_peduli      = $r->nilai_manual_peduli[$ped];
            $def_id_peduli     = $r->def_peduli_manual[$ped];

            $isialat[$ped] = SelfAssesment::updateOrCreate(
                [
                'user_id'             => Auth::user()->id,
                'tahun'               => date('Y'),
                'triwulan'            => $triwulan['current']['triwulan'],
                'alatukur_id'         => $alat_id_peduli
                ],
                [
                'iku_id'              => $iku_id_peduli,
                'definisinilai_id'    => $def_id_peduli,
                'filelampiran'        => $r->file_melayani,
                'skala_nilai'         => $nilai_peduli,
                'reportassesment_id'  => $rid[0]
                ]);

            $nilaipeduli += $nilai_peduli;
        }
    }
    if(!empty($r->alatukur_peduli)){
        $alatnyapeduli = $r->alatukur_peduli;
        // dd($alatnyapeduli);
        foreach($r->alatukur_peduli as $a => $datapeduli){
            $alatpeduli[$a] = collect(explode('#', $datapeduli));
            $iku_idpeduli[$a] = $alatpeduli[$a][0];            
            $alat_idpeduli[$a] = $alatpeduli[$a][1];
            $def_idpeduli[$a] = $alatpeduli[$a][2];
            $nilaipedulinya = $alatpeduli[$a][3];
            $isialat[$a] = SelfAssesment::updateOrCreate([
              'user_id'             => Auth::user()->id,
              'tahun'               => date('Y'),
              'triwulan'            => $triwulan['current']['triwulan'],
              'alatukur_id'         => $alat_idpeduli[$a]
              ],
              [
              'iku_id'              => $iku_idpeduli[$a],
              'definisinilai_id'    => $def_idpeduli[$a],
              'filelampiran'        => $r->file_melayani,
              'reportassesment_id'  => $rid[0],
              'skala_nilai'         => $nilaipedulinya[$a],
              'filelampiran'        => $r->file_peduli
              ]);

            $nilaipeduli += $nilaipedulinya[$a];
        }
    }
    else{$alatnyapeduli = 0;}

    // dd(request()->all());

    if ($r->nilai_manual_melayani != null) {
        $alatnyamelayani_man = count($r->nilai_manual_melayani);

        foreach($r->nilai_manual_melayani as $vnya => $datanya){

            $iku_id_melayani             = $r->iku_id_melayani_manual[$vnya];
            $alat_id_melayani            = $r->alatukur_id_melayani_manual[$vnya];
            $nilai_melayani              = $r->nilai_manual_melayani[$vnya];
            $def_id_melayani             = $r->def_id_melayani_manual[$vnya];

            $isialat[$vnya] = SelfAssesment::updateOrCreate(
                [
                'user_id'             => Auth::user()->id,
                'tahun'               => date('Y'),
                'triwulan'            => $triwulan['current']['triwulan'],
                'alatukur_id'         => $alat_id_melayani
                ],
                [
                'iku_id'              => $iku_id_melayani,
                'definisinilai_id'    => $def_id_melayani,
                'filelampiran'        => $r->file_melayani,
                'skala_nilai'         => $nilai_melayani,
                'reportassesment_id'  => $rid[0]
                ]);
            $nilaimelayani += $nilai_melayani;
        }
    }
    if(null != $r->alatukur_melayani){
        $alatnyamelayani = $r->alatukur_melayani;

        foreach($r->alatukur_melayani as $k => $data){
         $alatmelayani[$k] = explode('#', $data);
         $iku_idmelayani[$k] = $alatmelayani[$k][0];
         $alat_idmelayani[$k] = $alatmelayani[$k][1];
         $defidmelayani[$k] = $alatmelayani[$k][2];
         $nilaimelayaninya[$k] = $alatmelayani[$k][3];
         $isialat[$k] = SelfAssesment::updateOrCreate(
            [
            'user_id'             => Auth::user()->id,
            'tahun'               => date('Y'),
            'triwulan'            => $triwulan['current']['triwulan'],
            'alatukur_id'         => $alat_idmelayani[$k],
            ],
            [
            'iku_id'              => $iku_idmelayani[$k],
            'definisinilai_id'    => $defidmelayani[$k],
            'filelampiran'        => $r->file_melayani,
            'skala_nilai'         => $nilaimelayaninya[$k],
            'reportassesment_id'  => $rid[0]
            ]);
         // dd($nilaimelayaninya[$k]);
         $nilaimelayani += $nilaimelayaninya[$k];
     }
 }
 else{$alatnyamelayani = 0;}


 $peduli1 = Iku::where('tahun',date('Y'))
 ->where('namaprogram','pelaksanaan_program_budaya'.'#'.date('Y').'#'.$triwulan['current']['triwulan'].'#ojk_peduli')
 ->value('id');

 $melayani1 = Iku::where('tahun',date('Y'))
 ->where('namaprogram','pelaksanaan_program_budaya'.'#'.date('Y').'#'.$triwulan['current']['triwulan'].'#ojk_melayani')
 ->value('id');

 $inovatif1 = Iku::where('tahun',date('Y'))
 ->where('inovatif_triwulan',$triwulan['current']['triwulan'])
 ->where('satker',Auth::user()->id)
 ->where('programbudaya_id','3')
 ->value('id'); 
 
 $peduli = SelfAssesment::where('tahun',date('Y'))
 ->where('triwulan',$triwulan['current']['triwulan'])
 ->where('iku_id',$peduli1)
->value('id');

 $melayani = SelfAssesment::where('tahun',date('Y'))
 ->where('triwulan',$triwulan['current']['triwulan'])
 ->where('iku_id',$melayani1)
->value('id');

 $inovatif = SelfAssesment::where('tahun',date('Y'))
 ->where('triwulan',$triwulan['current']['triwulan'])
 ->where('iku_id',$inovatif1)
->value('id');

        //STAKE HOLDER MELAYANI
 foreach ($r->nama_stake_melayani as $q => $v) {
    $isi_stake_melayani[$q] = StakeHolder::updateOrCreate([
                // selfassesment_id di ambil dari data iku
     'user_id'            => Auth::user()->id,
     'nama'               => $v,
     'selfassesment_id'   => $melayani,
     'email'              => $r->email_stake_melayani[$q],
     'instansi'           => $r->instansi_stake_melayani[$q],
     'no_hp'              => $r->telp_stake_melayani[$q]
     ]);
}

        //STAKE HOLDER PEDULI
foreach ($r->nama_stake_peduli as $m => $l) {
    $isi_stake_peduli[$m] = StakeHolder::updateOrCreate([
                // selfassesment_id di ambil dari data iku
     'user_id'            => Auth::user()->id,
     'nama'               => $l,
     'selfassesment_id'   => $peduli,
     'email'              => $r->email_stake_peduli[$m],
     'instansi'           => $r->instansi_stake_peduli[$m],
     'no_hp'              => $r->telp_stake_peduli[$m]
     ]);
}

        //STAKE HOLDER PEDULI
foreach ($r->nama_stake_inovatif as $u => $p) {
    $isi_stake_inovatif[$u] = StakeHolder::updateOrCreate([
                // selfassesment_id di ambil dari data iku
     'user_id'            => Auth::user()->id,
     'nama'               => $p,
     'selfassesment_id'   => $inovatif,
     'email'              => $r->email_stake_inovatif[$u],
     'instansi'           => $r->instansi_stake_inovatif[$u],
     'no_hp'              => $r->telp_stake_inovatif[$u]
     ]);
}

$persenino = ProgramBudaya::where('id','3')->first();
$persenmelayani = ProgramBudaya::where('id','1')->first();
$persenpeduli = ProgramBudaya::where('id','2')->first();

$persen = \App\Persentase::where('tahun',date('Y'))
->where('triwulan',$triwulan['current']['triwulan'])
->where('daftarindikator_id','3')->first();

if (null != $r->alatukur_peduli) {
    $alatnyapeduli = count($r->alatukur_peduli);
}
if (null != $r->alatukur_melayani) {
    $alatnyamelayani = count($r->alatukur_melayani);
}

$hasilino       = ($nilaiino/((6*count($r->alatukur_inovatif))))*($persenino->persentase_program/100);

$hasilpeduli    = ($nilaipeduli/((6*($alatnyapeduli + $alatnyapeduli_man))))*($persenpeduli->persentase_program/100);

$hasilmelayani  = ($nilaimelayani/((6*($alatnyamelayani + $alatnyamelayani_man))))*($persenmelayani->persentase_program/100);

$hasilakhirnya  = (((($hasilino*100)+($hasilmelayani*100)+($hasilpeduli*100)))*($persen->nilai/100));

// dd($nilaimelayani);

 $self = SelfAssesment::where('user_id', Auth::user()->id)
         ->where('tahun', date('Y'))
         ->where('iku_id', $iku_idpeduli[$a])
         ->where('triwulan', $triwulan['current']['triwulan'])
         ->where('reportassesment_id', $rid[0])
         ->first();
if (count($self) == 0) {
    $self = new SelfAssesment;
}
$self->namaprogram = $r->peduli_program;
$self->deskripsi = $r->deskripsi_program;
$self->save();
 

$reportassess = ReportAssessment::where('tahun', date('Y'))
->where('triwulan', $triwulan['current']['triwulan'])
->where('daftarindikator_id', '3')
->where('user_id', Auth::user()->id)
->first();
if (count($reportassess) == 0) {
    $reportassess = new ReportAssessment;
}

$reportassess->nilai                    = number_format($hasilakhirnya,2);
$reportassess->persentase               = $persen->nilai;
$reportassess->hasil                    = number_format($hasilakhirnya,2);
$reportassess->daftarindikator_id       = 3;
$reportassess->triwulan                 = $triwulan['current']['triwulan'];
$reportassess->tahun                    = date('Y');
$reportassess->user_id                  = Auth::user()->id;
$reportassess->hasil_inovatif           = number_format(($hasilino*100),2);
$reportassess->hasil_peduli             = number_format(($hasilpeduli*100),2);
$reportassess->hasil_melayani           = number_format(($hasilmelayani*100),2);

if ($r->simpan == 0) {
    $reportassess->final_status             = '0';
}
elseif($r->simpan == 1){
    $reportassess->final_status             = '1';
}
$reportassess->save();

// return redirect('edit-self-assessment/'.$rid[0].'/serapan-anggaran')
return redirect()->back()->with('success','Pelaksanaan Program BUdaya Berhasil Di Masukan Nilai');
}

}
