<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArsipController extends Controller
{
    //
    public function arsipInovatifIndex(Request $r)
    {

        return view('inovatif.arsip');
    }
}
