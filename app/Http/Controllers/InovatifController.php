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
        $iku = Iku::updateOrCreate([
                'persen_id' => 0,
                'daftarindikator_id' => 3,
                'tahun' => date('Y'),
                'tipe' => 'parameterized',
                'programbudaya_id' => 3,
                'satker' => 10
            ],[	
                'namaprogram' => $r->nama,
				'keterangan' => $r->deskripsi,
                'latarbelakang' => $r->latarbelakang,
                'sasaran' => $r->sasaran,
                'tahapan' => $r->tahapan,
                'tujuan' => $r->tujuan,
                'isfinal' => $r->simpan
			   ]);

        // return $iku;
        $alatUkur = null;
        $definisinilai = null;
		if($r->alatnya !== null){
        foreach($r->alatnya as $k => $item) {
				if (null != request('cekalatukur'.$k) AND request('cekalatukur'.$k) == 1) {           
			 $alatUkur[$k] = AlatUkur::updateOrCreate([
                    'id' => $item,
                    'iku_id' => $iku->id
                ],[ 'name' => request('name'.$k),'active' => '1']);
				  }else{  
			 $alatUkur[$k] = AlatUkur::updateOrCreate([
                    'id' => $item,
                    'iku_id' => $iku->id
                ],[ 'name' => request('name'.$k),'active' => '0']);
				  }
                for($i=1; $i<= 6; $i++) {
                    for ($j=1; $j <= 4 ; $j++) { 
					\App\DefinisiNilai::updateOrCreate([
                    'alatukur_id' => $item,
                    'iku_id' => $iku->id,
                    'tahun' => date('Y'),
                    'skala_nilai' => $i,
                    'triwulan' => $j
                ],[ 'deskripsi' => request('alt'.$k.'_def'.$i.'_tw'.$j)]);
                    }
                }
		}			
		}else{$k = 0;}			
		 if($k < 3){
       do{
            if (null != request('cekalatukur'.$k) AND request('cekalatukur'.$k) == 1) {

                $alatUkur[$k] = AlatUkur::updateOrCreate([
                    'iku_id' => $iku->id,
                'name' => request('name'.$k),'active' => '1' ]);
                for($i=1; $i<= 6; $i++) { 

                    for ($j=1; $j <= 4 ; $j++) { 
                        $definisinilai[$k][$i][$j] = DefinisiNilai::updateOrCreate([
                            'iku_id' => $iku->id,
                            'alatukur_id' => $alatUkur[$k]->id,
                            'deskripsi' => request('alt'.$k.'_def'.$i.'_tw'.$j),
                            'triwulan' => $j,
                    'skala_nilai' => $i,
                            'tahun' => date('Y')
                        ]);   
                    }
                }
            }$k++;
         }while($k<3);
		 }
         $rv = [
            'AlatUkur' => $alatUkur,
            'definisi' => $definisinilai
         ];
        // return $definisiNilai1[$i];
        return redirect('inovatif')->with('success', 'Program OJK Inovatif Berhasil diperbaharui');
    }
}
