<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iku;

class ArsipController extends Controller
{
    //
    public function arsipInovatifIndex(Request $r)
    {
        return view('inovatif.arsip');
    }
}
