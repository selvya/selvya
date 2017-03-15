<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class InputTambahanController extends Controller
{
    public function lomba()
    {
    	$user = User::where('level','satker')->get();
    	return view('tambahan.lomba' ,compact('user'));
    }
    public function budayainternal()
    {
    	$user = User::where('level','satker')->get();
    	return view('tambahan.budaya-internal',compact('user'));
    }
    public function budayaeksternal()
    {
    	$user = User::where('level','satker')->get();
    	return view('tambahan.budaya-eksternal',compact('user'));
    }
    public function tambahlomba($id)
    {
    	return view('tambahan.tambah-lomba');
    }
    public function tambahbudayaeksternal($id)
    {
    	return view('tambahan.tambah-budaya-eksternal');
    }
    public function tambahbudayainternal($id)
    {
    	return view('tambahan.tambah-budaya-internal');
    }
}
