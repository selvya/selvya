<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departemen;
use App\DataTables\DepartemenDataTable;

class DepartemenController extends Controller
{
    public function index(DepartemenDataTable $dataTable)
    {
        return $dataTable->render('user.departemen');
    }
    public function createview()
    {
    	return view('user.tambah-departemen');
    }
    public function create(Request $r)
    {
    	$dep = new Departemen;
    	$dep->departemen_name = $r->departemen;
    	$dep->save();
    	return redirect()->back()->with('success','Departemen berhasil tersimpan');
    }
    public function hapus($id)
    {
    	Departemen::where('id', $id)->delete();
    	return redirect()->back()->with('success','Departemen berhasil terhapus');	
    }
    public function editview($id)
    {
    	$dep = Departemen::where('id', $id)->first();
    	return view('user.edit-departemen', compact('dep'));
    }
    public function edit(Request $r,$id)
    {
    	$dep = Departemen::findOrFail($id);
    	$dep->departemen_name = $r->departemen;
    	$dep->save();
    	return redirect()->back()->with('success','Departemen berhasil dirubah');	
    }
}
