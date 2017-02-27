<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Direktorat;
use App\DataTables\DirektoratDataTable;

class DirektoratController extends Controller
{
    public function index(DirektoratDataTable $dataTable)
    {
        return $dataTable->render('user.direktorat');
    }
    public function createview()
    {
    	return view('user.tambah-direktorat');
    }
    public function create(Request $r)
    {
    	$dep = new Direktorat;
    	$dep->direktorat_name = $r->direktorat;
    	$dep->save();
    	return redirect()->back()->with('success','Direktorat berhasil tersimpan');
    }
    public function hapus($id)
    {
    	Direktorat::where('id', $id)->delete();
    	return redirect()->back()->with('success','Direktorat berhasil terhapus');	
    }
    public function editview($id)
    {
    	$dir = Direktorat::where('id', $id)->first();
    	return view('user.edit-direktorat', compact('dir'));
    }
    public function edit(Request $r,$id)
    {
    	$dep = Direktorat::findOrFail($id);
    	$dep->direktorat_name = $r->direktorat;
    	$dep->save();
    	return redirect()->back()->with('success','Direktorat berhasil dirubah');	
    }
}
