<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Iku;

class ArsipController extends Controller
{
    //
    public function arsipInovatifIndex(Request $r)
    {
        // $triwulan = cekCurrentTriwulan();
        $ikunya = Iku::where('daftarindikator_id','3')
        ->where('tipe','parameterized')
        ->where('programbudaya_id','3')
        ->where('isfinal','y')
        ->where('satker',Auth::user()->id)
        ->get();

        return view('inovatif.arsip' , compact('ikunya'));
    }
}
