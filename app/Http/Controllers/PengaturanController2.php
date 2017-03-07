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

        $id = Hashids::connection('iku')->decode($hashid);
        if (count($id) == 0) {
            $response['message'] = 'Iku tidak ditemukan';
            return response()->json($response, 404);
        }
        
        $iku = Iku::with('komponen')->with('indikator')->find($id[0]);
        if (count($iku) == 0) {
            $response['message'] = 'Iku tidak ditemukan';
            return response()->json($response, 404);
        }

        $response['data'] = $iku;
        $response['status'] = true;
        
        return response()->json($response, 200);
    }

    public function simpanIkuBaru1(Request $r) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        //Cek jumlah keseluruhan
        $existingPersen = Iku::where('tahun', $r->modal_tahun1)
                            ->where('triwulan', $r->modal_triwulan1)
                            ->where('komponen_id', '!=', 3)
                            ->sum('persen');
        $existingPersen3 = Iku::where('tahun', $r->modal_tahun1)
                            ->where('triwulan', $r->modal_triwulan1)
                            ->where('komponen_id', 3)
                            ->sum('persen') / 3;

        if (($existingPersen + $existingPersen3 + $r->persen1) > 100) {
            $response['message'] = 'Total persen untuk satu triwulan maksimum 100%.';
            return response()->json($response, 200);
        }

        $iku = new Iku();
        $iku->komponen_id = 1;
        $iku->tahun = $r->modal_tahun1;
        $iku->triwulan = $r->modal_triwulan1;
        $iku->persen = $r->persen1;
        $iku->tipe = 'otomatis';
        $iku->keterangan = $r->keterangan1;
        $iku->is_program_budaya = 't';
        $iku->program_budaya = null;
        
        if (!$iku->save()) {
            $response['message'] = 'Gagal menyimpan';
        }

        //Indikator
        $indikator1 = new IndikatorIku();
        $indikator1->iku_id = $iku->id;
        $indikator1->type = 'otomatis';
        $indikator1->deskripsi = $r->indikator1_1;
        $indikator1->save();

        $indikator2 = new IndikatorIku();
        $indikator2->iku_id = $iku->id;
        $indikator2->type = 'otomatis';
        $indikator2->deskripsi = $r->indikator1_2;
        $indikator2->save();

        $indikator3 = new IndikatorIku();
        $indikator3->iku_id = $iku->id;
        $indikator3->type = 'otomatis';
        $indikator3->deskripsi = $r->indikator1_3;
        $indikator3->save();

        $indikator4 = new IndikatorIku();
        $indikator4->iku_id = $iku->id;
        $indikator4->type = 'otomatis';
        $indikator4->deskripsi = $r->indikator1_4;
        $indikator4->save();

        $indikator5 = new IndikatorIku();
        $indikator5->iku_id = $iku->id;
        $indikator5->type = 'otomatis';
        $indikator5->deskripsi = $r->indikator1_5;
        $indikator5->save();

        $indikator6 = new IndikatorIku();
        $indikator6->iku_id = $iku->id;
        $indikator6->type = 'otomatis';
        $indikator6->deskripsi = $r->indikator1_6;
        $indikator6->save();

        $response['status'] = true;
        $response['data'] = $iku;
        $response['data']['hashid'] = $iku->hashid;

        return response()->json($response, 200);
    }

    public function simpanIkuEdit1(Request $r) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        //Cek Iku
        $id = Hashids::connection('iku')->decode($r->hashid);
        if (count($id) == 0) {
            $response['message'] = 'Iku tidak ditemukan. Error';
            return response()->json($response, 200);
        }

        $iku = Iku::find($id[0]);
        if (count($iku) == 0) {
            $response['message'] = 'Iku tidak ditemukan. Error';
            return response()->json($response, 200);
        }

        //Cek jumlah keseluruhan
        $existingPersen = Iku::where('tahun', $r->modal_tahun1Edit)
                            ->where('triwulan', $r->modal_triwulan1Edit)
                            ->where('komponen_id', '!=', 3)
                            ->whereNotIn('id', [$iku->id])
                            ->sum('persen');
        $existingPersen3 = Iku::where('tahun', $r->modal_tahun1Edit)
                            ->where('triwulan', $r->modal_triwulan1Edit)
                            ->where('komponen_id', 3)
                            ->sum('persen') / 3;

        if (($existingPersen + $existingPersen3 + $r->persen1Edit) > 100) {
            $response['message'] = 'Total persen untuk satu triwulan maksimum 100%.';
            return response()->json($response, 200);
        }

        $iku->komponen_id = 1;
        $iku->triwulan = $r->modal_triwulan1Edit;
        $iku->persen = $r->persen1Edit;
        $iku->keterangan = $r->keterangan1Edit;
        $iku->program_budaya = null;
        
        if (!$iku->save()) {
            $response['message'] = 'Gagal menyimpan';
        }

        IndikatorIku::where('iku_id', $iku->id)->delete();
        //Indikator
        $indikator1 = new IndikatorIku();
        $indikator1->iku_id = $iku->id;
        $indikator1->type = 'otomatis';
        $indikator1->deskripsi = $r->indikator1_1Edit;
        $indikator1->save();

        $indikator2 = new IndikatorIku();
        $indikator2->iku_id = $iku->id;
        $indikator2->type = 'otomatis';
        $indikator2->deskripsi = $r->indikator1_2Edit;
        $indikator2->save();

        $indikator3 = new IndikatorIku();
        $indikator3->iku_id = $iku->id;
        $indikator3->type = 'otomatis';
        $indikator3->deskripsi = $r->indikator1_3Edit;
        $indikator3->save();

        $indikator4 = new IndikatorIku();
        $indikator4->iku_id = $iku->id;
        $indikator4->type = 'otomatis';
        $indikator4->deskripsi = $r->indikator1_4Edit;
        $indikator4->save();

        $indikator5 = new IndikatorIku();
        $indikator5->iku_id = $iku->id;
        $indikator5->type = 'otomatis';
        $indikator5->deskripsi = $r->indikator1_5Edit;
        $indikator5->save();

        $indikator6 = new IndikatorIku();
        $indikator6->iku_id = $iku->id;
        $indikator6->type = 'otomatis';
        $indikator6->deskripsi = $r->indikator1_6Edit;
        $indikator6->save();

        $response['status'] = true;
        $response['data'] = $iku;
        $response['data']['hashid'] = $iku->hashid;

        return response()->json($response, 200);
    }

    public function simpanIkuBaru2(Request $r) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        //Cek jumlah keseluruhan
        $existingPersen = Iku::where('tahun', $r->modal_tahun2)
                            ->where('triwulan', $r->modal_triwulan2)
                            ->where('komponen_id', '!=', 3)
                            ->sum('persen');

        $existingPersen3 = Iku::where('tahun', $r->modal_tahun2)
                            ->where('triwulan', $r->modal_triwulan2)
                            ->where('komponen_id', 3)
                            ->sum('persen') / 3;

        if (($existingPersen + $existingPersen3 + $r->persen2) > 100) {
            $response['message'] = 'Total persen untuk satu triwulan maksimum 100%.';
            return response()->json($response, 200);
        }

        $iku = new Iku();
        $iku->komponen_id = 2;
        $iku->tahun = $r->modal_tahun2;
        $iku->triwulan = $r->modal_triwulan2;
        $iku->persen = $r->persen2;
        $iku->tipe = 'otomatis';
        $iku->keterangan = $r->keterangan2;
        $iku->is_program_budaya = 't';
        $iku->program_budaya = null;
        
        if (!$iku->save()) {
            $response['message'] = 'Gagal menyimpan';
        }

        //Indikator
        $indikator1 = new IndikatorIku();
        $indikator1->iku_id = $iku->id;
        $indikator1->type = 'otomatis';
        $indikator1->deskripsi = $r->indikator2_1;
        $indikator1->save();

        $indikator2 = new IndikatorIku();
        $indikator2->iku_id = $iku->id;
        $indikator2->type = 'otomatis';
        $indikator2->deskripsi = $r->indikator2_2;
        $indikator2->save();

        $indikator3 = new IndikatorIku();
        $indikator3->iku_id = $iku->id;
        $indikator3->type = 'otomatis';
        $indikator3->deskripsi = $r->indikator2_3;
        $indikator3->save();

        $indikator4 = new IndikatorIku();
        $indikator4->iku_id = $iku->id;
        $indikator4->type = 'otomatis';
        $indikator4->deskripsi = $r->indikator2_4;
        $indikator4->save();

        $indikator5 = new IndikatorIku();
        $indikator5->iku_id = $iku->id;
        $indikator5->type = 'otomatis';
        $indikator5->deskripsi = $r->indikator2_5;
        $indikator5->save();

        $indikator6 = new IndikatorIku();
        $indikator6->iku_id = $iku->id;
        $indikator6->type = 'otomatis';
        $indikator6->deskripsi = $r->indikator2_6;
        $indikator6->save();

        $response['status'] = true;
        $response['data'] = $iku;
        $response['data']['hashid'] = $iku->hashid;

        return response()->json($response, 200);
    }

    public function simpanIkuEdit2(Request $r) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        //Cek Iku
        $id = Hashids::connection('iku')->decode($r->hashid);
        if (count($id) == 0) {
            $response['message'] = 'Iku tidak ditemukan. Error';
            return response()->json($response, 200);
        }

        $iku = Iku::find($id[0]);
        if (count($iku) == 0) {
            $response['message'] = 'Iku tidak ditemukan. Error';
            return response()->json($response, 200);
        }

        //Cek jumlah keseluruhan
        $existingPersen = Iku::where('tahun', $r->modal_tahun2Edit)
                            ->where('triwulan', $r->modal_triwulan2Edit)
                            ->where('komponen_id', '!=', 3)
                            ->whereNotIn('id', [$iku->id])
                            ->sum('persen');

        $existingPersen3 = Iku::where('tahun', $r->modal_tahun2Edit)
                            ->where('triwulan', $r->modal_triwulan2Edit)
                            ->where('komponen_id', 3)
                            ->sum('persen') / 3;

        if (($existingPersen + $existingPersen3 + $r->persen2Edit) > 100) {
            $response['message'] = 'Total persen untuk satu triwulan maksimum 100%.';
            return response()->json($response, 200);
        }

        $iku->komponen_id = 2;
        $iku->triwulan = $r->modal_triwulan2Edit;
        $iku->persen = $r->persen2Edit;
        $iku->keterangan = $r->keterangan2Edit;
        $iku->program_budaya = null;
        
        if (!$iku->save()) {
            $response['message'] = 'Gagal menyimpan';
        }

        IndikatorIku::where('iku_id', $iku->id)->delete();
        //Indikator
        $indikator1 = new IndikatorIku();
        $indikator1->iku_id = $iku->id;
        $indikator1->type = 'otomatis';
        $indikator1->deskripsi = $r->indikator2_1Edit;
        $indikator1->save();

        $indikator2 = new IndikatorIku();
        $indikator2->iku_id = $iku->id;
        $indikator2->type = 'otomatis';
        $indikator2->deskripsi = $r->indikator2_2Edit;
        $indikator2->save();

        $indikator3 = new IndikatorIku();
        $indikator3->iku_id = $iku->id;
        $indikator3->type = 'otomatis';
        $indikator3->deskripsi = $r->indikator2_3Edit;
        $indikator3->save();

        $indikator4 = new IndikatorIku();
        $indikator4->iku_id = $iku->id;
        $indikator4->type = 'otomatis';
        $indikator4->deskripsi = $r->indikator2_4Edit;
        $indikator4->save();

        $indikator5 = new IndikatorIku();
        $indikator5->iku_id = $iku->id;
        $indikator5->type = 'otomatis';
        $indikator5->deskripsi = $r->indikator2_5Edit;
        $indikator5->save();

        $indikator6 = new IndikatorIku();
        $indikator6->iku_id = $iku->id;
        $indikator6->type = 'otomatis';
        $indikator6->deskripsi = $r->indikator2_6Edit;
        $indikator6->save();

        $response['status'] = true;
        $response['data'] = $iku;
        $response['data']['hashid'] = $iku->hashid;

        return response()->json($response, 200);
    }

    public function simpanIkuBaru4(Request $r) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        //Cek jumlah keseluruhan
        $existingPersen = Iku::where('tahun', $r->modal_tahun4)
                            ->where('triwulan', $r->modal_triwulan4)
                            ->where('komponen_id', '!=', 3)
                            ->sum('persen');
        $existingPersen3 = Iku::where('tahun', $r->modal_tahun3)
                            ->where('triwulan', $r->modal_triwulan3)
                            ->where('komponen_id', 3)
                            ->sum('persen') / 3;

        if (($existingPersen + $existingPersen3 + $r->persen4) > 100) {
            $response['message'] = 'Total persen untuk satu triwulan maksimum 100%.';
            return response()->json($response, 200);
        }

        $iku = new Iku();
        $iku->komponen_id = 4;
        $iku->tahun = $r->modal_tahun4;
        $iku->triwulan = $r->modal_triwulan4;
        $iku->persen = $r->persen4;
        $iku->tipe = 'otomatis';
        $iku->keterangan = $r->keterangan4;
        $iku->is_program_budaya = 't';
        $iku->program_budaya = null;
        
        if (!$iku->save()) {
            $response['message'] = 'Gagal menyimpan';
        }

        //Indikator
        $indikator1 = new IndikatorIku();
        $indikator1->iku_id = $iku->id;
        $indikator1->type = 'otomatis';
        $indikator1->deskripsi = $r->indikator4_1;
        $indikator1->save();

        $indikator2 = new IndikatorIku();
        $indikator2->iku_id = $iku->id;
        $indikator2->type = 'otomatis';
        $indikator2->deskripsi = $r->indikator4_2;
        $indikator2->save();

        $indikator3 = new IndikatorIku();
        $indikator3->iku_id = $iku->id;
        $indikator3->type = 'otomatis';
        $indikator3->deskripsi = $r->indikator4_3;
        $indikator3->save();

        $indikator4 = new IndikatorIku();
        $indikator4->iku_id = $iku->id;
        $indikator4->type = 'otomatis';
        $indikator4->deskripsi = $r->indikator4_4;
        $indikator4->save();

        $indikator5 = new IndikatorIku();
        $indikator5->iku_id = $iku->id;
        $indikator5->type = 'otomatis';
        $indikator5->deskripsi = $r->indikator4_5;
        $indikator5->save();

        $indikator6 = new IndikatorIku();
        $indikator6->iku_id = $iku->id;
        $indikator6->type = 'otomatis';
        $indikator6->deskripsi = $r->indikator4_6;
        $indikator6->save();

        $response['status'] = true;
        $response['data'] = $iku;
        $response['data']['hashid'] = $iku->hashid;

        return response()->json($response, 200);
    }

    public function simpanIkuEdit4(Request $r) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        //Cek Iku
        $id = Hashids::connection('iku')->decode($r->hashid);
        if (count($id) == 0) {
            $response['message'] = 'Iku tidak ditemukan. Error';
            return response()->json($response, 200);
        }

        $iku = Iku::find($id[0]);
        if (count($iku) == 0) {
            $response['message'] = 'Iku tidak ditemukan. Error';
            return response()->json($response, 200);
        }

        //Cek jumlah keseluruhan
        $existingPersen = Iku::where('tahun', $r->modal_tahun4Edit)
                            ->where('triwulan', $r->modal_triwulan4Edit)
                            ->where('komponen_id', '!=', 3)
                            ->whereNotIn('id', [$iku->id])
                            ->sum('persen');
        $existingPersen3 = Iku::where('tahun', $r->modal_tahun4Edit)
                            ->where('triwulan', $r->modal_triwulan4Edit)
                            ->where('komponen_id', 3)
                            ->sum('persen') / 3;

        if (($existingPersen + $existingPersen3 + $r->persen4Edit) > 100) {
            $response['message'] = 'Total persen untuk satu triwulan maksimum 100%.';
            return response()->json($response, 200);
        }

        $iku->komponen_id = 4;
        $iku->triwulan = $r->modal_triwulan4Edit;
        $iku->persen = $r->persen4Edit;
        $iku->keterangan = $r->keterangan4Edit;
        $iku->program_budaya = null;
        
        if (!$iku->save()) {
            $response['message'] = 'Gagal menyimpan';
        }

        IndikatorIku::where('iku_id', $iku->id)->delete();
        //Indikator
        $indikator1 = new IndikatorIku();
        $indikator1->iku_id = $iku->id;
        $indikator1->type = 'otomatis';
        $indikator1->deskripsi = $r->indikator4_1Edit;
        $indikator1->save();

        $indikator2 = new IndikatorIku();
        $indikator2->iku_id = $iku->id;
        $indikator2->type = 'otomatis';
        $indikator2->deskripsi = $r->indikator4_2Edit;
        $indikator2->save();

        $indikator3 = new IndikatorIku();
        $indikator3->iku_id = $iku->id;
        $indikator3->type = 'otomatis';
        $indikator3->deskripsi = $r->indikator4_3Edit;
        $indikator3->save();

        $indikator4 = new IndikatorIku();
        $indikator4->iku_id = $iku->id;
        $indikator4->type = 'otomatis';
        $indikator4->deskripsi = $r->indikator4_4Edit;
        $indikator4->save();

        $indikator5 = new IndikatorIku();
        $indikator5->iku_id = $iku->id;
        $indikator5->type = 'otomatis';
        $indikator5->deskripsi = $r->indikator4_5Edit;
        $indikator5->save();

        $indikator6 = new IndikatorIku();
        $indikator6->iku_id = $iku->id;
        $indikator6->type = 'otomatis';
        $indikator6->deskripsi = $r->indikator4_6Edit;
        $indikator6->save();

        $response['status'] = true;
        $response['data'] = $iku;
        $response['data']['hashid'] = $iku->hashid;

        return response()->json($response, 200);
    }

    public function simpanIkuBaru5(Request $r) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        //Cek jumlah keseluruhan
        $existingPersen = Iku::where('tahun', $r->modal_tahun5)
                            ->where('triwulan', $r->modal_triwulan5)
                            ->where('komponen_id', '!=', 3)
                            ->sum('persen');
        $existingPersen3 = Iku::where('tahun', $r->modal_tahun5)
                            ->where('triwulan', $r->modal_triwulan5)
                            ->where('komponen_id', 3)
                            ->sum('persen') / 3;

        if (($existingPersen + $existingPersen3 + $r->persen5) > 100) {
            $response['message'] = 'Total persen untuk satu triwulan maksimum 100%.';
            return response()->json($response, 200);
        }

        $iku = new Iku();
        $iku->komponen_id = 5;
        $iku->tahun = $r->modal_tahun5;
        $iku->triwulan = $r->modal_triwulan5;
        $iku->persen = $r->persen5;
        $iku->tipe = 'manual';
        $iku->keterangan = $r->keterangan5;
        $iku->is_program_budaya = 't';
        $iku->program_budaya = null;
        
        if (!$iku->save()) {
            $response['message'] = 'Gagal menyimpan';
        }

        $response['status'] = true;
        $response['data'] = $iku;
        $response['data']['hashid'] = $iku->hashid;

        return response()->json($response, 200);
    }

    public function simpanIkuEdit5(Request $r) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        //Cek Iku
        $id = Hashids::connection('iku')->decode($r->hashid);
        if (count($id) == 0) {
            $response['message'] = 'Iku tidak ditemukan. Error';
            return response()->json($response, 200);
        }

        $iku = Iku::find($id[0]);
        if (count($iku) == 0) {
            $response['message'] = 'Iku tidak ditemukan. Error';
            return response()->json($response, 200);
        }

        //Cek jumlah keseluruhan
        $existingPersen = Iku::where('tahun', $r->modal_tahun5Edit)
                            ->where('triwulan', $r->modal_triwulan5Edit)
                            ->where('komponen_id', '!=', 3)
                            ->whereNotIn('id', [$iku->id])
                            ->sum('persen');
        $existingPersen3 = Iku::where('tahun', $r->modal_tahun5Edit)
                            ->where('triwulan', $r->modal_triwulan5Edit)
                            ->where('komponen_id', 3)
                            ->sum('persen') / 3;

        if (($existingPersen + $existingPersen3 + $r->persen5Edit) > 100) {
            $response['message'] = 'Total persen untuk satu triwulan maksimum 100%.';
            return response()->json($response, 200);
        }

        $iku->komponen_id = 5;
        $iku->triwulan = $r->modal_triwulan5Edit;
        $iku->persen = $r->persen5Edit;
        $iku->keterangan = $r->keterangan5Edit;
        $iku->program_budaya = null;
        
        if (!$iku->save()) {
            $response['message'] = 'Gagal menyimpan';
        }

        $response['status'] = true;
        $response['data'] = $iku;
        $response['data']['hashid'] = $iku->hashid;

        return response()->json($response, 200);
    }

    public function simpanIkuBaru6(Request $r) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        //Cek jumlah keseluruhan
        $existingPersen = Iku::where('tahun', $r->modal_tahun6)
                            ->where('triwulan', $r->modal_triwulan6)
                            ->where('komponen_id', '!=', 3)
                            ->sum('persen');

        $existingPersen3 = Iku::where('tahun', $r->modal_tahun6)
                            ->where('triwulan', $r->modal_triwulan6)
                            ->where('komponen_id', 3)
                            ->sum('persen') / 3;

        if (($existingPersen + $existingPersen3 + $r->persen6) > 100) {
            $response['message'] = 'Total persen untuk satu triwulan maksimum 100%.';
            return response()->json($response, 200);
        }

        $iku = new Iku();
        $iku->komponen_id = 6;
        $iku->tahun = $r->modal_tahun6;
        $iku->triwulan = $r->modal_triwulan6;
        $iku->persen = $r->persen6;
        $iku->tipe = 'manual';
        $iku->keterangan = $r->keterangan6;
        $iku->is_program_budaya = 't';
        $iku->program_budaya = null;
        
        if (!$iku->save()) {
            $response['message'] = 'Gagal menyimpan';
        }

        $response['status'] = true;
        $response['data'] = $iku;
        $response['data']['hashid'] = $iku->hashid;

        return response()->json($response, 200);
    }

    public function simpanIkuEdit6(Request $r) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        //Cek Iku
        $id = Hashids::connection('iku')->decode($r->hashid);
        if (count($id) == 0) {
            $response['message'] = 'Iku tidak ditemukan. Error';
            return response()->json($response, 200);
        }

        $iku = Iku::find($id[0]);
        if (count($iku) == 0) {
            $response['message'] = 'Iku tidak ditemukan. Error';
            return response()->json($response, 200);
        }

        //Cek jumlah keseluruhan
        $existingPersen = Iku::where('tahun', $r->modal_tahun6Edit)
                            ->where('triwulan', $r->modal_triwulan6Edit)
                            ->where('komponen_id', '!=', 3)
                            ->whereNotIn('id', [$iku->id])
                            ->sum('persen');

        $existingPersen3 = Iku::where('tahun', $r->modal_tahun6Edit)
                            ->where('triwulan', $r->modal_triwulan6Edit)
                            ->where('komponen_id', 3)
                            ->sum('persen') / 3;

        if (($existingPersen + $existingPersen3 + $r->persen6Edit) > 100) {
            $response['message'] = 'Total persen untuk satu triwulan maksimum 100%.';
            return response()->json($response, 200);
        }

        $iku->komponen_id = 6;
        $iku->triwulan = $r->modal_triwulan6Edit;
        $iku->persen = $r->persen6Edit;
        $iku->keterangan = $r->keterangan6Edit;
        $iku->program_budaya = null;
        
        if (!$iku->save()) {
            $response['message'] = 'Gagal menyimpan';
        }

        $response['status'] = true;
        $response['data'] = $iku;
        $response['data']['hashid'] = $iku->hashid;

        return response()->json($response, 200);
    }

    public function simpanIkuBaru7(Request $r) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        //Cek jumlah keseluruhan
        $existingPersen = Iku::where('tahun', $r->modal_tahun7)
                            ->where('triwulan', $r->modal_triwulan7)
                            ->where('komponen_id', '!=', 3)
                            ->sum('persen');

        $existingPersen3 = Iku::where('tahun', $r->modal_tahun7)
                            ->where('triwulan', $r->modal_triwulan7)
                            ->where('komponen_id', 3)
                            ->sum('persen') / 3;

        if (($existingPersen + $existingPersen3 + $r->persen7) > 100) {
            $response['message'] = 'Total persen untuk satu triwulan maksimum 100%.';
            return response()->json($response, 200);
        }

        $iku = new Iku();
        $iku->komponen_id = 7;
        $iku->tahun = $r->modal_tahun7;
        $iku->triwulan = $r->modal_triwulan7;
        $iku->persen = $r->persen7;
        $iku->tipe = 'manual';
        $iku->keterangan = $r->keterangan7;
        $iku->is_program_budaya = 't';
        $iku->program_budaya = null;
        
        if (!$iku->save()) {
            $response['message'] = 'Gagal menyimpan';
        }

        $response['status'] = true;
        $response['data'] = $iku;
        $response['data']['hashid'] = $iku->hashid;

        return response()->json($response, 200);
    }

    public function simpanIkuEdit7(Request $r) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        //Cek Iku
        $id = Hashids::connection('iku')->decode($r->hashid);
        if (count($id) == 0) {
            $response['message'] = 'Iku tidak ditemukan. Error';
            return response()->json($response, 200);
        }

        $iku = Iku::find($id[0]);
        if (count($iku) == 0) {
            $response['message'] = 'Iku tidak ditemukan. Error';
            return response()->json($response, 200);
        }

        //Cek jumlah keseluruhan
        $existingPersen = Iku::where('tahun', $r->modal_tahun7Edit)
                            ->where('triwulan', $r->modal_triwulan7Edit)
                            ->where('komponen_id', '!=', 3)
                            ->whereNotIn('id', [$iku->id])
                            ->sum('persen');

        $existingPersen3 = Iku::where('tahun', $r->modal_tahun7Edit)
                            ->where('triwulan', $r->modal_triwulan7Edit)
                            ->where('komponen_id', 3)
                            ->sum('persen') / 3;

        if (($existingPersen + $existingPersen3 + $r->persen7Edit) > 100) {
            $response['message'] = 'Total persen untuk satu triwulan maksimum 100%.';
            return response()->json($response, 200);
        }

        $iku->komponen_id = 7;
        $iku->triwulan = $r->modal_triwulan7Edit;
        $iku->persen = $r->persen7Edit;
        $iku->keterangan = $r->keterangan7Edit;
        $iku->program_budaya = null;
        
        if (!$iku->save()) {
            $response['message'] = 'Gagal menyimpan';
        }

        $response['status'] = true;
        $response['data'] = $iku;
        $response['data']['hashid'] = $iku->hashid;

        return response()->json($response, 200);
    }

    function special(Request $r) {
        // dd($r->tahun);
        if ((int) $r->tahun < 2017 OR (int) $r->tahun >= 2100) {
            abort(404);
        }

        if ((int) $r->triwulan < 1 OR (int) $r->triwulan > 4) {
            abort(404);
        }

        if ((int) $r->jenis < 1 OR (int) $r->jenis > 3) {
            abort(404);
        }

        $jenis = [
            1 => 'OJK Melayani',
            2 => 'OJK Peduli',
            3 => 'OJK Inovatif'
        ];

        $jenis = $jenis[$r->jenis];
        // dd($jenis);
        $triwulan = (int) $r->triwulan;

        $iku = Iku::updateOrCreate([
            'komponen_id' => 3,
            'tahun' => $r->tahun,
            'triwulan' => $triwulan,
            'is_program_budaya' => 'y',
            'program_budaya' => $jenis
        ]);


        return view('admin.special', compact('jenis', 'triwulan', 'iku'));
    }

    public function simpanOjkPeduli(Request $r) {

        $validation = Validator::make($r->all(), [
            'hashid' => 'required',
            'persen' => 'required|integer|max:100'
        ]);


        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $id = Hashids::connection('iku')->decode($r->hashid);
        if (count($id) == 0) {
            $iku = new Iku();
        }else{
            $iku = Iku::findOrFail($id[0]);
        }

        //Cek jumlah keseluruhan
        $existingPersen = Iku::where('tahun', $iku->tahun)
                            ->where('triwulan', $iku->triwulan)
                            ->where('komponen_id', '!=', 3)
                            ->whereNotIn('id', [$iku->id])
                            ->sum('persen');

        $existingPersen3 = Iku::where('tahun', $iku->tahun)
                            ->where('triwulan', $iku->triwulan)
                            ->where('komponen_id', 3)
                            ->sum('persen') / 3;
        if (($existingPersen + $existingPersen3 + $r->persen) > 100) {
            Session::flash('message', 'Total persen untuk satu triwulan maksimum 100%.');
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $iku->tipe = $r->input_tipe;
        $iku->persen = $r->persen;
        $iku->keterangan = $r->keterangan;

        $iku->save();

        IndikatorIku::where('iku_id', $iku->id)->delete();
        if ($r->input_tipe == 'otomatis') {
            //Indikaotr
            $indikator1 = new IndikatorIku();
            $indikator1->iku_id = $iku->id;
            $indikator1->type = 'otomatis';
            $indikator1->deskripsi = $r->indikator_1;
            $indikator1->save();

            $indikator2 = new IndikatorIku();
            $indikator2->iku_id = $iku->id;
            $indikator2->type = 'otomatis';
            $indikator2->deskripsi = $r->indikator_2;
            $indikator2->save();

            $indikator3 = new IndikatorIku();
            $indikator3->iku_id = $iku->id;
            $indikator3->type = 'otomatis';
            $indikator3->deskripsi = $r->indikator_3;
            $indikator3->save();

            $indikator4 = new IndikatorIku();
            $indikator4->iku_id = $iku->id;
            $indikator4->type = 'otomatis';
            $indikator4->deskripsi = $r->indikator_4;
            $indikator4->save();

            $indikator5 = new IndikatorIku();
            $indikator5->iku_id = $iku->id;
            $indikator5->type = 'otomatis';
            $indikator5->deskripsi = $r->indikator_5;
            $indikator5->save();

            $indikator6 = new IndikatorIku();
            $indikator6->iku_id = $iku->id;
            $indikator6->type = 'otomatis';
            $indikator6->deskripsi = $r->indikator_6;
            $indikator6->save();
        }
        
        // dd($iku);
        //Success
        return redirect(url('admin/pengaturan'));
    }

    public function simpanOjkMelayani(Request $r) {
        $validation = Validator::make($r->all(), [
            'hashid' => 'required',
            'persen' => 'required|integer|max:100'
        ]);


        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $id = Hashids::connection('iku')->decode($r->hashid);
        if (count($id) == 0) {
            $iku = new Iku();
        }else{
            $iku = Iku::findOrFail($id[0]);
        }

        //Cek jumlah keseluruhan
        $existingPersen = Iku::where('tahun', $iku->tahun)
                            ->where('triwulan', $iku->triwulan)
                            ->where('komponen_id', '!=', 3)
                            ->whereNotIn('id', [$iku->id])
                            ->sum('persen');

        $existingPersen3 = Iku::where('tahun', $iku->tahun)
                            ->where('triwulan', $iku->triwulan)
                            ->where('komponen_id', 3)
                            ->sum('persen') / 3;

        if (($existingPersen + $existingPersen3 + $r->persen) > 100) {
            Session::flash('message', 'Total persen untuk satu triwulan maksimum 100%.');
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $iku->tipe = $r->input_tipe;
        $iku->persen = $r->persen;
        $iku->keterangan = $r->keterangan;

        $iku->save();

        if ($r->input_tipe == 'otomatis') {
            if ($r->has('mc')) {
                IndikatorIku::where('iku_id', $iku->id)->where('type', 'mysteri_call')->delete();
                //Indikaotr
                $indikator1 = new IndikatorIku();
                $indikator1->iku_id = $iku->id;
                $indikator1->type = 'mysteri_call';
                $indikator1->deskripsi = $r->mindikator_1;
                $indikator1->save();

                $indikator2 = new IndikatorIku();
                $indikator2->iku_id = $iku->id;
                $indikator2->type = 'mysteri_call';
                $indikator2->deskripsi = $r->mindikator_2;
                $indikator2->save();

                $indikator3 = new IndikatorIku();
                $indikator3->iku_id = $iku->id;
                $indikator3->type = 'mysteri_call';
                $indikator3->deskripsi = $r->mindikator_3;
                $indikator3->save();

                $indikator4 = new IndikatorIku();
                $indikator4->iku_id = $iku->id;
                $indikator4->type = 'mysteri_call';
                $indikator4->deskripsi = $r->mindikator_4;
                $indikator4->save();

                $indikator5 = new IndikatorIku();
                $indikator5->iku_id = $iku->id;
                $indikator5->type = 'mysteri_call';
                $indikator5->deskripsi = $r->mindikator_5;
                $indikator5->save();

                $indikator6 = new IndikatorIku();
                $indikator6->iku_id = $iku->id;
                $indikator6->type = 'mysteri_call';
                $indikator6->deskripsi = $r->mindikator_6;
                $indikator6->save();
            }else{
                IndikatorIku::where('iku_id', $iku->id)->where('type', 'mysteri_call')->delete();
            }

            if ($r->has('sks')) {
                IndikatorIku::where('iku_id', $iku->id)->where('type', 'sks')->delete();
                //Indikaotr
                $indikator1 = new IndikatorIku();
                $indikator1->iku_id = $iku->id;
                $indikator1->type = 'sks';
                $indikator1->deskripsi = $r->sindikator_1;
                $indikator1->save();

                $indikator2 = new IndikatorIku();
                $indikator2->iku_id = $iku->id;
                $indikator2->type = 'sks';
                $indikator2->deskripsi = $r->sindikator_2;
                $indikator2->save();

                $indikator3 = new IndikatorIku();
                $indikator3->iku_id = $iku->id;
                $indikator3->type = 'sks';
                $indikator3->deskripsi = $r->sindikator_3;
                $indikator3->save();

                $indikator4 = new IndikatorIku();
                $indikator4->iku_id = $iku->id;
                $indikator4->type = 'sks';
                $indikator4->deskripsi = $r->sindikator_4;
                $indikator4->save();

                $indikator5 = new IndikatorIku();
                $indikator5->iku_id = $iku->id;
                $indikator5->type = 'sks';
                $indikator5->deskripsi = $r->sindikator_5;
                $indikator5->save();

                $indikator6 = new IndikatorIku();
                $indikator6->iku_id = $iku->id;
                $indikator6->type = 'sks';
                $indikator6->deskripsi = $r->sindikator_6;
                $indikator6->save();
            }else{
                IndikatorIku::where('iku_id', $iku->id)->where('type', 'sks')->delete();
            }
        }

        return redirect(url('admin/pengaturan'));
    }

    public function simpanOjkInovatif(Request $r) {

        $validation = Validator::make($r->all(), [
            'hashid' => 'required',
            'persen' => 'required|integer|max:100'
        ]);


        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $id = Hashids::connection('iku')->decode($r->hashid);
        if (count($id) == 0) {
            $iku = new Iku();
        }else{
            $iku = Iku::findOrFail($id[0]);
        }

        //Cek jumlah keseluruhan
        $existingPersen = Iku::where('tahun', $iku->tahun)
                            ->where('triwulan', $iku->triwulan)
                            ->where('komponen_id', '!=', 3)
                            ->whereNotIn('id', [$iku->id])
                            ->sum('persen');

        $existingPersen3 = Iku::where('tahun', $iku->tahun)
                            ->where('triwulan', $iku->triwulan)
                            ->where('komponen_id', 3)
                            ->sum('persen') / 3;
        if (($existingPersen + $existingPersen3 + $r->persen) > 100) {
            Session::flash('message', 'Total persen untuk satu triwulan maksimum 100%.');
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $iku->tipe = 'manual';
        $iku->persen = $r->persen;
        $iku->keterangan = $r->keterangan;

        $iku->save();
        
        // dd($iku);
        //Success
        return redirect(url('admin/pengaturan'));
    }

}
