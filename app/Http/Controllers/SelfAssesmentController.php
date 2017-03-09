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
     * Memeriksa dan menyimpan kecepatan pelaporan.
     *
     * @param  Illuminate\Http\Request  $r
     * @return json
     */
    public function cekSimpanPelaporan(Request $r) {

        $nilai = 1;

        $now = Carbon::now();
        $data = $this->setSatker(2, 1, $now);
        $batas = getBatasTanggalPelaporan(date('Y'), $data['triwulan']);
        $persen = cekPersenLaporan(date('Y'), 1);
        $iku = cekIkuPelaporan($now->year, $data['triwulan']);

        //Ubah menjadi request atau parameter
        $tanggalKirim = Carbon::parse($r->tanggal);

        //Tanggal tidak ada atau tidak valid
        if ($tanggalKirim == null OR ! $tanggalKirim instanceof Carbon) {
            return $nilai;
        }

        

        return $iku;
    }




    //DUMMY SETTER
    public function setSatker($id = 1, $triwulan = 1, $tanggal = null) {
        $data = [
            'satker' => $id,
            'triwulan' => $triwulan,
            'tanggal' => $tanggal
        ];

        return $data;
    }
}
