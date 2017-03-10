<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iku;
use App\DefinisiNilai;
use App\AlatUkur;
use App\Persentase;


class InovatifController extends Controller
{
    public function tambah(Request $r)
    {
        // $iku = new Iku;
        // $iku->namaprogram = $r->nama;
        // $iku->keterangan = $r->deksripsi;
        // $iku->tujuan = $r->tujuan;
        // $iku->tipe = 'parameterized';
        // $iku->programbudaya_id = '3';
        // $iku->daftarindikator_id = '3';
        // $iku->tahun = date('Y');
        // $iku->persen_id = '0';
        $persentase = Persentase::where('triwulan','1')->where('daftarindikator','3')->first();

        $iku = Iku::updateOrCreate([
            'daftarindikator_id' => $persentase->daftarindikator_id,
            'tahun' => date('Y'),
            'namaprogram' => $r->namaprogram,
            'persen_id' => $persentase->id
        ]);

        if ($r->cekalatukur1) {

            $alatUkur1 = AlatUkur::updateOrCreate([
                'iku_id' => $iku->id,
                'name' => $iku->namaprogram
            ]);

            // $alat = new AlatUkur;
            // $alat->iku_id = '0';
            // $alat->name = $r->cekalatukur1;
            // $simpan_alat = $alat->save();

            $definisiNilai1 = $alatUkur1->definisi;

            if (count($alatUkur1->definisi) < 6)  {
                for ($i=0; $i < 6; $i++) { 
                    // $nilai = new DefinisiNilai;
                    // $nilai->skala_nilai = $r->alatukur1;
                    // $nilai->deskripsi = null;
                    // $nilai->triwulan = null;
                    // $nilai->alatukur_id = '0';
                    // $nilai->iku_id = '0';

                    $definisiNilai1[$i] = DefinisiNilai::create([
                        'iku_id' => $iku->id,
                        'alatukur_id' => $alatUkur->id,
                        'deskripsi' => request('def1'..'_tw1'),
                        'triwulan' => $persentase->triwulan,
                        'tahun' => $persentase->tahun
                    ]);
                }
            }
        }
        return redirect()->back();
    }
}
