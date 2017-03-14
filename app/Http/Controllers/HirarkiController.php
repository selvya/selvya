<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hirarki;
use App\Departemen;
use App\Direktorat;
use App\Komisioner;

class HirarkiController extends Controller
{
    //

    public function index(Request $r)
    {

        $departemen = Departemen::all();
        $direktorat = Direktorat::all();
        $komisioner = Komisioner::all();

        return view('hirarki.index', compact('departemen', 'direktorat', 'komisioner'));
    }
}
