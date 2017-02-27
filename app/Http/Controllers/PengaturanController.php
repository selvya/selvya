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

        //Cek apakah sudah ada iku
        foreach ($komponenIku as $key => $value) {
            $iku = Iku::updateOrCreate([
                'komponen_id' => $value->id,
                'tahun' => $tahun,
                'triwulan' => 1
            ]);
            $iku = Iku::updateOrCreate([
                'komponen_id' => $value->id,
                'tahun' => $tahun,
                'triwulan' => 2
            ]);
            $iku = Iku::updateOrCreate([
                'komponen_id' => $value->id,
                'tahun' => $tahun,
                'triwulan' => 3
            ]);
            $iku = Iku::updateOrCreate([
                'komponen_id' => $value->id,
                'tahun' => $tahun,
                'triwulan' => 4
            ]);
        }

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
        
        $iku = Iku::with('komponen')->find($id[0]);
        if (count($iku) == 0) {
            $response['message'] = 'Iku tidak ditemukan';
            return response()->json($response, 404);
        }

        $response['data'] = $iku;
        $response['status'] = true;
        
        return response()->json($response, 200);
    }
}
