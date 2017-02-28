<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hashids;

use App\Iku;
use App\KomponenIku;

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

    public function simpanIkuBaru(Request $r) {
        $response = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        $komponen = KomponenIku::findOrFail($r->komponen_id);

        $iku = new Iku();
        $iku->komponen_id = $komponen->id;
        $iku->tahun = $r->modal_tahun;
        $iku->triwulan = $r->modal_triwulan;
        $iku->persen = $r->persen;
        $iku->tipe = $r->input_tipe;
        $iku->keterangan = $r->keterangan;
        $iku->is_program_budaya = $r->modal_is_program_budaya;
        $iku->program_budaya = $r->program_budaya;
        
        if (!$iku->save()) {
            $response['message'] = 'Gagal menyimpan';
        }

        $response['status'] = true;
        $response['data'] = $iku->with('komponen');

        return response()->json($response, 200);
    }
}
