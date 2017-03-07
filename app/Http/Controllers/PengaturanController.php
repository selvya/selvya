<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hashids;
use Validator;
use Session;

use App\Iku;
use App\DaftarIndikator;
use App\IndikatorIku;
use App\Persentase;
use App\AlatUkur;
use App\DefinisiNilai;

class PengaturanController extends Controller
{
    //
    public function index(Request $r) {
        
        $tahun = date('Y');
        if (null != $r->tahun AND $r->tahun != '') {
            $tahun = $r->tahun;
        }

        $daftarIndikator = DaftarIndikator::all();


        //Cek apakah sudah ada Persen
        foreach ($daftarIndikator as $key => $value) {
            
            $field['daftarindikator_id'] = $value->id;
            $field['tahun'] = $tahun;

            for ($i=1; $i <= 4; $i++) { 
                $field['triwulan'] = $i;
                $iku = Persentase::updateOrCreate($field);
            }
        }
        // exit();

        return view('admin.pengaturan', compact('tahun', 'daftarIndikator'));
    }

    public function getPersentaseAjax($hashid) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        $id = Hashids::connection('persentase')->decode($hashid);
        if (count($id) == 0) {
            $response['message'] = 'Persentase tidak ditemukan';
            return response()->json($response, 404);
        }
        
        $persentase = Persentase::find($id[0]);
        if (count($persentase) == 0) {
            $response['message'] = 'Iku tidak ditemukan';
            return response()->json($response, 404);
        }

        $iku = null;
        $alatUkur = null;
        if ($persentase->daftar_indikator->id != 3) {
            //Cek Iku
            $iku = Iku::updateOrCreate([
                'daftarindikator_id' => $persentase->daftar_indikator->id,
                'tahun' => $persentase->tahun,
                'namaprogram' => str_slug($persentase->daftar_indikator->name, '_') . '#' . $persentase->tahun . '#' . $persentase->triwulan,
                'persen_id' => $persentase->id
            ]);

            $alatUkur = AlatUkur::updateOrCreate([
                'iku_id' => $iku->id,
                'name' => $iku->namaprogram
            ]);

            $definisiNilai = $alatUkur->definisi;

            if (count($alatUkur->definisi) < 6)  {
                
                for ($i=0; $i < 6; $i++) { 
                    $definisiNilai[$i] = DefinisiNilai::create([
                        'iku_id' => $iku->id,
                        'alatukur_id' => $alatUkur->id,
                        'deskripsi' => null,
                        'triwulan' => $persentase->triwulan,
                        'tahun' => $persentase->tahun
                    ]);
                }
            }
        }        

        $response['data']['persentase'] = $persentase;
        $response['data']['iku'] = $iku;
        $response['data']['alat_ukur'] = $alatUkur;
        $response['status'] = true;
        
        return response()->json($response, 200);
    }


    public function getPersentaseAjax3($hashid) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        $id = Hashids::connection('persentase')->decode($hashid);
        if (count($id) == 0) {
            $response['message'] = 'Persentase tidak ditemukan';
            return response()->json($response, 404);
        }
        
        $persentase = Persentase::find($id[0]);
        if (count($persentase) == 0) {
            $response['message'] = 'Iku tidak ditemukan';
            return response()->json($response, 404);
        }

        $iku = null;
        $alatUkur = null;

        //Cek Iku
        $iku1 = Iku::updateOrCreate([
            'daftarindikator_id' => $persentase->daftar_indikator->id,
            'tahun' => $persentase->tahun,
            'namaprogram' => str_slug($persentase->daftar_indikator->name, '_') . '#' . $persentase->tahun . '#' . $persentase->triwulan . '#' . str_slug('OJK Melayani', '_'),
            'persen_id' => $persentase->id,
            'programbudaya_id' => 1,
            'satker' => 0
        ]);


        $iku2 = Iku::updateOrCreate([
            'daftarindikator_id' => $persentase->daftar_indikator->id,
            'tahun' => $persentase->tahun,
            'namaprogram' => str_slug($persentase->daftar_indikator->name, '_') . '#' . $persentase->tahun . '#' . $persentase->triwulan . '#' . str_slug('OJK Peduli', '_'),
            'persen_id' => $persentase->id,
            'programbudaya_id' => 2,
            'satker' => 0
        ]);


        $iku3 = Iku::updateOrCreate([
            'daftarindikator_id' => $persentase->daftar_indikator->id,
            'tahun' => $persentase->tahun,
            'namaprogram' => str_slug($persentase->daftar_indikator->name, '_') . '#' . $persentase->tahun . '#' . $persentase->triwulan . '#' . str_slug('OJK Inovatif', '_'),
            'persen_id' => $persentase->id,
            'programbudaya_id' => 3,
            'satker' => 0
        ]);

        $alatUkur1 = AlatUkur::updateOrCreate([
            'iku_id' => $iku1->id,
            'name' => $iku1->namaprogram
        ]);

        $alatUkur2 = AlatUkur::updateOrCreate([
            'iku_id' => $iku2->id,
            'name' => $iku2->namaprogram
        ]);

        $alatUkur3 = AlatUkur::updateOrCreate([
            'iku_id' => $iku3->id,
            'name' => $iku3->namaprogram
        ]);

  
            
        for ($i=0; $i < 6; $i++) { 
            $definisiNilai1[$i] = DefinisiNilai::updateOrcreate([
                'iku_id' => $iku1->id,
                'alatukur_id' => $alatUkur1->id,
                'deskripsi' => null,
                'triwulan' => $persentase->triwulan,
                'tahun' => $persentase->tahun
            ]);
            
            $definisiNilai2[$i] = DefinisiNilai::updateOrcreate([
                'iku_id' => $iku2->id,
                'alatukur_id' => $alatUkur2->id,
                'deskripsi' => null,
                'triwulan' => $persentase->triwulan,
                'tahun' => $persentase->tahun
            ]);

            $definisiNilai3[$i] = DefinisiNilai::updateOrcreate([
                'iku_id' => $iku3->id,
                'alatukur_id' => $alatUkur3->id,
                'deskripsi' => null,
                'triwulan' => $persentase->triwulan,
                'tahun' => $persentase->tahun
            ]);
        }
        

        $response['data']['persentase'] = $persentase;
        $response['data']['iku1'] = $iku1;
        $response['data']['iku2'] = $iku2;
        $response['data']['iku3'] = $iku3;
        $response['data']['alat_ukur1'] = $alatUkur1;
        $response['data']['alat_ukur2'] = $alatUkur2;
        $response['data']['alat_ukur3'] = $alatUkur3;
        $response['data']['definisi1'] = $definisiNilai1;
        $response['data']['definisi2'] = $definisiNilai2;
        $response['data']['definisi3'] = $definisiNilai3;
        $response['status'] = true;
        
        return response()->json($response, 200);
    }

    function persentaseEdit1(Request $r) {

        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        $id = Hashids::connection('persentase')->decode($r->hashid);
        if (count($id) == 0) {
            $response['message'] = 'Persentase tidak ditemukan';
            return response()->json($response, 404);
        }
        
        $persentase = Persentase::find($id[0]);
        if (count($persentase) == 0) {
            $response['message'] = 'Iku tidak ditemukan';
            return response()->json($response, 404);
        }

        $existingPersen = Persentase::where('tahun', $persentase->tahun)
                            ->where('triwulan', $persentase->triwulan)
                            ->whereNotIn('id', [$persentase->id])
                            ->sum('nilai');
        
        if (($existingPersen + $r->persen1) > 100) {
            $response['message'] = 'Total persen untuk satu triwulan maksimum 100%.';
            return response()->json($response, 200);
        }

        $iku = Iku::where('namaprogram', 
                            str_slug($persentase->daftar_indikator->name, '_') . 
                            '#' . $persentase->tahun . 
                            '#' . $persentase->triwulan
                )->first();
        $iku->keterangan = $r->keterangan1;
        $iku->save();

        $persentase->nilai = $r->persen1;
        $persentase->save();

        $alatUkur = AlatUkur::where('name', 
                            str_slug($persentase->daftar_indikator->name, '_') . 
                            '#' . $persentase->tahun . 
                            '#' . $persentase->triwulan
                )->first();

        // return request('definisi1_1');
        foreach ($alatUkur->definisi as $key => $value) {
            $value->deskripsi = request('definisi1_' . ($key+1));
            $value->save();
        }

        $response['status'] = true;
        $response['data']['persen'] = $persentase->nilai;
        return response()->json($response, 200);
    }

    function persentaseEdit2(Request $r) {

        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        $id = Hashids::connection('persentase')->decode($r->hashid);
        if (count($id) == 0) {
            $response['message'] = 'Persentase tidak ditemukan';
            return response()->json($response, 404);
        }
        
        $persentase = Persentase::find($id[0]);
        if (count($persentase) == 0) {
            $response['message'] = 'Iku tidak ditemukan';
            return response()->json($response, 404);
        }

        $existingPersen = Persentase::where('tahun', $persentase->tahun)
                            ->where('triwulan', $persentase->triwulan)
                            ->whereNotIn('id', [$persentase->id])
                            ->sum('nilai');
        
        if (($existingPersen + $r->persen2) > 100) {
            $response['message'] = 'Total persen untuk satu triwulan maksimum 100%.';
            return response()->json($response, 200);
        }

        $iku = Iku::where('namaprogram', 
                            str_slug($persentase->daftar_indikator->name, '_') . 
                            '#' . $persentase->tahun . 
                            '#' . $persentase->triwulan
                )->first();
        $iku->keterangan = $r->keterangan2;
        $iku->save();

        $persentase->nilai = $r->persen2;
        $persentase->save();

        $alatUkur = AlatUkur::where('name', 
                            str_slug($persentase->daftar_indikator->name, '_') . 
                            '#' . $persentase->tahun . 
                            '#' . $persentase->triwulan
                )->first();

        foreach ($alatUkur->definisi as $key => $value) {
            $value->deskripsi = request('definisi2_' . ($key+1));
            $value->save();
        }

        $response['status'] = true;
        $response['data']['persen'] = $persentase->nilai;
        return response()->json($response, 200);
    }

    function persentaseEdit4(Request $r) {

        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        $id = Hashids::connection('persentase')->decode($r->hashid);
        if (count($id) == 0) {
            $response['message'] = 'Persentase tidak ditemukan';
            return response()->json($response, 404);
        }
        
        $persentase = Persentase::find($id[0]);
        if (count($persentase) == 0) {
            $response['message'] = 'Iku tidak ditemukan';
            return response()->json($response, 404);
        }

        $existingPersen = Persentase::where('tahun', $persentase->tahun)
                            ->where('triwulan', $persentase->triwulan)
                            ->whereNotIn('id', [$persentase->id])
                            ->sum('nilai');
        
        if (($existingPersen + $r->persen4) > 100) {
            $response['message'] = 'Total persen untuk satu triwulan maksimum 100%.';
            return response()->json($response, 200);
        }

        $iku = Iku::where('namaprogram', 
                            str_slug($persentase->daftar_indikator->name, '_') . 
                            '#' . $persentase->tahun . 
                            '#' . $persentase->triwulan
                )->first();
        $iku->keterangan = $r->keterangan4;
        $iku->save();

        $persentase->nilai = $r->persen4;
        $persentase->save();

        $alatUkur = AlatUkur::where('name', 
                            str_slug($persentase->daftar_indikator->name, '_') . 
                            '#' . $persentase->tahun . 
                            '#' . $persentase->triwulan
                )->first();

        foreach ($alatUkur->definisi as $key => $value) {
            $value->deskripsi = request('definisi4_' . ($key+1));
            $value->save();
        }

        $response['status'] = true;
        $response['data']['persen'] = $persentase->nilai;
        return response()->json($response, 200);
    }

    function persentaseEdit5(Request $r) {

        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        $id = Hashids::connection('persentase')->decode($r->hashid);
        if (count($id) == 0) {
            $response['message'] = 'Persentase tidak ditemukan';
            return response()->json($response, 404);
        }
        
        $persentase = Persentase::find($id[0]);
        if (count($persentase) == 0) {
            $response['message'] = 'Iku tidak ditemukan';
            return response()->json($response, 404);
        }

        $existingPersen = Persentase::where('tahun', $persentase->tahun)
                            ->where('triwulan', $persentase->triwulan)
                            ->whereNotIn('id', [$persentase->id])
                            ->sum('nilai');
        
        if (($existingPersen + $r->persen5) > 100) {
            $response['message'] = 'Total persen untuk satu triwulan maksimum 100%.';
            return response()->json($response, 200);
        }

        $iku = Iku::where('namaprogram', 
                            str_slug($persentase->daftar_indikator->name, '_') . 
                            '#' . $persentase->tahun . 
                            '#' . $persentase->triwulan
                )->first();
        $iku->keterangan = $r->keterangan5;
        $iku->tipe = 'manual';
        $iku->save();

        $persentase->nilai = $r->persen5;
        $persentase->save();

        $alatUkur = AlatUkur::where('name', 
                            str_slug($persentase->daftar_indikator->name, '_') . 
                            '#' . $persentase->tahun . 
                            '#' . $persentase->triwulan
                )->first();

        $response['status'] = true;
        $response['data']['persen'] = $persentase->nilai;
        return response()->json($response, 200);
    }

    function persentaseEdit6(Request $r) {

        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        $id = Hashids::connection('persentase')->decode($r->hashid);
        if (count($id) == 0) {
            $response['message'] = 'Persentase tidak ditemukan';
            return response()->json($response, 404);
        }
        
        $persentase = Persentase::find($id[0]);
        if (count($persentase) == 0) {
            $response['message'] = 'Iku tidak ditemukan';
            return response()->json($response, 404);
        }

        $existingPersen = Persentase::where('tahun', $persentase->tahun)
                            ->where('triwulan', $persentase->triwulan)
                            ->whereNotIn('id', [$persentase->id])
                            ->sum('nilai');
        
        if (($existingPersen + $r->persen6) > 100) {
            $response['message'] = 'Total persen untuk satu triwulan maksimum 100%.';
            return response()->json($response, 200);
        }

        $iku = Iku::where('namaprogram', 
                            str_slug($persentase->daftar_indikator->name, '_') . 
                            '#' . $persentase->tahun . 
                            '#' . $persentase->triwulan
                )->first();
        $iku->keterangan = $r->keterangan6;
        $iku->tipe = 'manual';
        $iku->save();

        $persentase->nilai = $r->persen6;
        $persentase->save();

        $alatUkur = AlatUkur::where('name', 
                            str_slug($persentase->daftar_indikator->name, '_') . 
                            '#' . $persentase->tahun . 
                            '#' . $persentase->triwulan
                )->first();

        $response['status'] = true;
        $response['data']['persen'] = $persentase->nilai;
        return response()->json($response, 200);
    }

    function persentaseEdit7(Request $r) {

        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        $id = Hashids::connection('persentase')->decode($r->hashid);
        if (count($id) == 0) {
            $response['message'] = 'Persentase tidak ditemukan';
            return response()->json($response, 404);
        }
        
        $persentase = Persentase::find($id[0]);
        if (count($persentase) == 0) {
            $response['message'] = 'Iku tidak ditemukan';
            return response()->json($response, 404);
        }

        $existingPersen = Persentase::where('tahun', $persentase->tahun)
                            ->where('triwulan', $persentase->triwulan)
                            ->whereNotIn('id', [$persentase->id])
                            ->sum('nilai');
        
        if (($existingPersen + $r->persen7) > 100) {
            $response['message'] = 'Total persen untuk satu triwulan maksimum 100%.';
            return response()->json($response, 200);
        }

        $iku = Iku::where('namaprogram', 
                            str_slug($persentase->daftar_indikator->name, '_') . 
                            '#' . $persentase->tahun . 
                            '#' . $persentase->triwulan
                )->first();
        $iku->keterangan = $r->keterangan7;
        $iku->tipe = 'manual';
        $iku->save();

        $persentase->nilai = $r->persen7;
        $persentase->save();

        $alatUkur = AlatUkur::where('name', 
                            str_slug($persentase->daftar_indikator->name, '_') . 
                            '#' . $persentase->tahun . 
                            '#' . $persentase->triwulan
                )->first();

        $response['status'] = true;
        $response['data']['persen'] = $persentase->nilai;
        return response()->json($response, 200);
    }
}