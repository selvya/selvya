<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hashids;
use Validator;
use Session;
use Carbon\Carbon;

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
}
