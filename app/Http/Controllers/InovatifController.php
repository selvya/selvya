<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iku;
use App\DefinisiNilai;
use App\AlatUkur;
use App\Persentase;


class InovatifController extends Controller
{

    // private $satker;

    // public function __construct()
    // {
    //     $satker = 10;
    // }
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
        //$persentase = Persentase::where('triwulan','1')->where('daftarindikator','3')->first();
        //$persentase = Persentase::where('triwulan','1')->where('daftarindikator','3')->first();

        // for ($i=1; $i <=4 ; $i++) { 
        //     $persentase[$i] = Persentase::where('tahun', date('Y'))
        //                     ->where('triwulan',($i+1))
        //                     ->where('daftarindikator','3')
        //                     ->first();
        // }
        // dd($r->simpan);
        $iku = Iku::updateOrCreate([
                'persen_id' => 0,
                'daftarindikator_id' => 3,
                'tahun' => date('Y'),
                'namaprogram' => $r->nama,
                'tipe' => 'parameterized',
                'keterangan' => $r->deksripsi,
                'tujuan' => $r->tujuan,
                'programbudaya_id' => 3,
                'isfinal' => $r->simpan,
                'satker' => 10
            ]);

        // return $iku;
        $alatUkur = null;
        $definisinilai = null;
        for ($k=1; $k <= 3; $k++) { 

            if (null != request('cekalatukur'.$k) AND request('cekalatukur'.$k) == 1) {

                $alatUkur[$k] = AlatUkur::updateOrCreate([
                    'iku_id' => $iku->id,
                    'name' => $iku->namaprogram
                ]);
                for($i=1; $i<= 6; $i++) { 

                    for ($j=1; $j <= 4 ; $j++) { 
                        $definisinilai[$k][$i][$j] = DefinisiNilai::create([
                            'iku_id' => $iku->id,
                            'alatukur_id' => $alatUkur[$k]->id,
                            'deskripsi' => request('alt'.$k.'_def'.$i.'_tw'.$j),
                            'triwulan' => $j,
                            'tahun' => date('Y')
                        ]);   
                    }
                }
            }
         }

         $rv = [
            'AlatUkur' => $alatUkur,
            'definisi' => $definisinilai
         ];
        // return $definisiNilai1[$i];
        return redirect()->back()->with('success', 'Program OJK Inovatif Berhasil di Tambahkan');
    }
}
