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
        $triwulan = 1;

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
            'triwulan'      => $triwulan['current']['triwulan'], 
            'tahun'         => date('Y'),
            'user_id'       => Auth::user()->id
            ]);

        $reportall = ReportAssessment::where('triwulan',$triwulan['current']['triwulan'])
        ->where('tahun',date('Y'))
        ->where('user_id',Auth::user()->id)
        ->get();

        // dd(count($reportall));

        return view('assesment.lembar',compact('report','triwulan','reportall'));
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
        ->where(
            'namaprogram',
            'pelaksanaan_program_budaya' . 
            '#' . date('Y') .
            '#' . $triwulan['current']['triwulan'] .
            '#ojk_peduli'
            )->first();

        $melayani = Iku::where('tahun',date('Y'))
        ->where(
            'namaprogram',
            'pelaksanaan_program_budaya' .
            '#' . date('Y') .
            '#' . $triwulan['current']['triwulan'] .
            '#ojk_melayani'
            )->first();

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
        ->where('user_id',Auth::user()->id)
        ->get();  

        return view('assesment.programbudaya', compact('peduli','melayani','inovatif','alatino','alatpeduli','alatmelayani','persen','triwulan','anggaran','pimpinan','pelaporan','reportall'));
    }

    public function serapananggaran($id)
    { 

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

        return view('assesment.serapananggaran', compact('anggaranN','targetN','rencanaN','inovatif','peduli','melayani','persen','triwulan','anggaran','pimpinan','pelaporan'));
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

        return view('assesment.pelaporan', compact('inovatif','anggaran','pimpinan','pelaporan','persen'));
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
  // dd(request()->all());

        $triwulan = cekCurrentTriwulan();

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
              ]
              );
            $nilaiino += $nilai[$b];
        }


        foreach($r->alatukur_peduli as $a => $data){

            $alat[$a] = collect(explode('#', $data));

            $iku_id[$a] = $alat[$a][0];
            $alat_id[$a] = $alat[$a][1];
            $def_id[$a] = $alat[$a][2];
            $nilai[$a] = $alat[$a][3];
            $isialat[$a] = SelfAssesment::updateOrCreate([
              'user_id'             => Auth::user()->id,
              'tahun'               => date('Y'),
              'triwulan'            => $triwulan['current']['triwulan'],
              'alatukur_id'         => $alat_id[$a]
              ],
              [
              'iku_id'              => $iku_id[$a],
              'definisinilai_id'    => $def_id[$a],
              'filelampiran'        => $r->file_melayani,
              'reportassesment_id'  => $rid[0],
              'skala_nilai'         => $nilai[$a],
              'filelampiran'        => $r->file_peduli
              ]
              );

            $nilaipeduli += $nilai[$a];
        }

        foreach($r->alatukur_melayani as $k => $data){

            $alat[$k] = collect(explode('#', $data));

            $iku_id[$k] = $alat[$k][0];
            $alat_id[$k] = $alat[$k][1];
            $def_id[$k] = $alat[$k][2];
            $nilai[$k] = $alat[$k][3];

            // echo $alat[$k];

            $isialat[$k] = SelfAssesment::updateOrCreate(
                [
                'user_id'             => Auth::user()->id,
                'tahun'               => date('Y'),
                'triwulan'            => $triwulan['current']['triwulan'],
                'alatukur_id'         => $alat_id[$k]
                ],
                [
                'iku_id'              => $iku_id[$k],
                'definisinilai_id'    => $def_id[$k],
                'filelampiran'        => $r->file_melayani,
                'reportassesment_id'  => $rid[0]
                ]);
            $nilaimelayani += $nilai[$k];
        }

        // dd(request()->all());

        $peduli = Iku::where('tahun',date('Y'))
        ->where('namaprogram','pelaksanaan_program_budaya'.'#'.date('Y').'#'.$triwulan['current']['triwulan'].'#ojk_peduli')
        ->first();

        $melayani = Iku::where('tahun',date('Y'))
        ->where('namaprogram','pelaksanaan_program_budaya'.'#'.date('Y').'#'.$triwulan['current']['triwulan'].'#ojk_melayani')
        ->first();

        $inovatif = Iku::where('tahun',date('Y'))
        ->where('namaprogram','pelaksanaan_program_budaya'.'#'.date('Y').'#'.$triwulan['current']['triwulan'].'#ojk_inovatif')
        ->first();


        //STAKE HOLDER MELAYANI
        foreach ($r->nama_stake_melayani as $q => $v) {
            $isi_stake_melayani[$q] = StakeHolder::updateOrCreate([
                // selfassesment_id di ambil dari data iku
             'user_id'            => Auth::user()->id,
             'nama'               => $v,
             'selfassesment_id'   => $melayani->id,
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
             'selfassesment_id'   => $peduli->id,
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
             'selfassesment_id'   => $inovatif->id,
             'email'              => $r->email_stake_inovatif[$u],
             'instansi'           => $r->instansi_stake_inovatif[$u],
             'no_hp'              => $r->telp_stake_inovatif[$u]
             ]);
        }

        $persen = \App\Persentase::where('tahun',date('Y'))
        ->where('triwulan',$triwulan['current']['triwulan'])
        ->where('daftarindikator_id','3')->first();

        $hasilino = ($nilaiino/((6*count($r->alatukur_inovatif))))*($persen->nilai/100);
        $hasilpeduli = ($nilaipeduli/((6*count($r->alatukur_peduli))))*($persen->nilai/100);
        $hasilmelayani = ($nilaimelayani/((6*count($r->alatukur_melayani))))*($persen->nilai/100);

        $hasilakhirnya = (((($hasilino*100)+($hasilmelayani*100)+($hasilpeduli*100)))*($persen->nilai/100));

           // echo $hasilakhirnya;

        $reportassess                           = new ReportAssessment;
        $reportassess->nilai                    = $hasilakhirnya;
        $reportassess->persentase               = $persen->nilai;
        $reportassess->hasil                    = $hasilakhirnya;
        $reportassess->triwulan                 = $triwulan['current']['triwulan'];
        $reportassess->tahun                    = date('Y');
        $reportassess->user_id                  = Auth::user()->id;
        $reportassess->hasil_inovatif           = $hasilino;
        $reportassess->hasil_peduli             = $hasilpeduli;
        $reportassess->hasil_melayani           = $hasilmelayani;
        $reportassess->final_status             = '0';
        $reportassess->save();

        return redirect('edit-self-assessment/'.$rid[0].'/serapan-anggaran')
        ->with('success','Pelaksanaan Program BUdaya Berhasil Di Masukan Nilai');


            // $isi_stake_inovatif[$u] = ReportAssessment::updateOrCreate([

            //     'triwulan'   => $triwulan['current']['triwulan'],
            //     'tahun'      => date('Y'),
            //     'user_id'    => Auth::user()->id
            // ]);


    }

}
