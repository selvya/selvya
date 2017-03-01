<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hashids;

use App\Iku;
use App\KomponenIku;
use App\IndikatorIku;

class PengaturanController extends Controller
{
    //
    public function index(Request $r) {
        
        $tahun = date('Y');
        if (null != $r->tahun AND $r->tahun != '') {
            $tahun = $r->tahun;
        }

        // $kompon = Iku::where('tahun', $tahun)->get();
        $komponenIku = KomponenIku::all();

        // //Cek apakah sudah ada iku
        // foreach ($komponenIku as $key => $value) {
        //     $field['komponen_id'] = $value->id;
        //     $field['tahun'] = $tahun;

        //     for ($i=1; $i <=4 ; $i++) { 
        //         $field['triwulan'] = $i;
        //         $iku = Iku::updateOrCreate($field);
        //     }
        // }

        return view('admin.pengaturan', compact('tahun', 'komponenIku'));
    }

    public function getIkuAjax($hashid) {
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
                            ->sum('persen');

        if (($existingPersen + $r->persen1) > 100) {
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
                            ->whereNotIn('id', [$iku->id])
                            ->sum('persen');

        if (($existingPersen + $r->persen1Edit) > 100) {
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
                            ->sum('persen');

        if (($existingPersen + $r->persen2) > 100) {
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
                            ->whereNotIn('id', [$iku->id])
                            ->sum('persen');

        if (($existingPersen + $r->persen2Edit) > 100) {
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
                            ->sum('persen');

        if (($existingPersen + $r->persen4) > 100) {
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
                            ->whereNotIn('id', [$iku->id])
                            ->sum('persen');

        if (($existingPersen + $r->persen4Edit) > 100) {
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
                            ->sum('persen');

        if (($existingPersen + $r->persen5) > 100) {
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
                            ->whereNotIn('id', [$iku->id])
                            ->sum('persen');

        if (($existingPersen + $r->persen5Edit) > 100) {
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
                            ->sum('persen');

        if (($existingPersen + $r->persen6) > 100) {
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
                            ->whereNotIn('id', [$iku->id])
                            ->sum('persen');

        if (($existingPersen + $r->persen6Edit) > 100) {
            $response['message'] = 'Total persen untuk satu triwulan maksimum 100%.';
            return response()->json($response, 200);
        }

        $iku->komponen_id = 5;
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
}
