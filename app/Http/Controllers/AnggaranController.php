<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\AnggaranTahun;
use App\AnggaranTriwulan;
use App\Persentase;
use App\Iku;
use App\AlatUkur;
use App\DefinisiNilai;
use Validator;

class AnggaranController extends Controller
{
    //
    public function index(Request $r)
    {
        $satker = getSatker();
        // dd($satker);

        $anggaran = AnggaranTahun::updateOrCreate(
            ['user_id' => $satker, 'tahun' => date('Y')]
        );

        for ($i=1; $i <= 4 ; $i++) { 
            $anggaranTriwulan[$i] = AnggaranTriwulan::updateOrCreate(
                [
                    'user_id' => $satker,
                    'anggaran_tahun_id' => $anggaran->id,
                    'triwulan' => $i
                ]
            );
        }
        

        return view('monitoring.anggaran', compact('anggaran'));
    }

    public function ubah(Request $r)
    {

        // return getSatker();
        $satker = getSatker();

        $anggaran = AnggaranTahun::updateOrCreate(
            ['user_id' => $satker, 'tahun' => date('Y')]
        );

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
                Session::flash('msg', '<div class="alert alert-success">File Lampiran hairs berupa file .zip, .rar, .jpg, .jpeg, atau .pdf</div>');
                return redirect()->back();
            }

            $fileName  = 'Lampiran_Anggaran_' . date('Y') . '_' . $i . '_' . $satker . '_';
            $fileName .= str_random(4) . '.';
            $fileName .= pathinfo($value->getClientOriginalName(), PATHINFO_EXTENSION);

            if(!$value->move(storage_path() . '/uploads/lampiran_anggaran/', $fileName)){
                return response()->json(['status' => false, 'data' => [], 'message' => 'Gagal mengupload']);
            }

            $anggaranTriwulan[$i] = AnggaranTriwulan::updateOrCreate(
                [
                    'user_id' => $satker,
                    'anggaran_tahun_id' => $tahunAnggaran->id,
                    'triwulan' => explode('lampiran_', $i)[1]
                ],
                [ 
                    'file' => $fileName
                ]
            );
            // dd($fileName);
        }

        Session::flash('msg', '<div class="alert alert-success">Berhasil menyimpan</div>');
        return redirect()->back();
    }
}
