<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komisioner;
use App\DataTables\KomisionerDataTable;

class KomisionerController extends Controller
{
    public function index(KomisionerDataTable $dataTable)
    {
        return $dataTable->render('user.komisioner');
    }
    public function createview()
    {
    	return view('user.tambah-komisioner');
    }
    public function create(Request $r)
    {
    	$kom = new Komisioner;
    	$kom->komisioner_name = $r->komisioner;
    	$kom->save();
    	return redirect()->back()->with('success','Komisioner berhasil tersimpan');
    }
    public function hapus($id)
    {
    	Komisioner::where('id', $id)->delete();
    	return redirect()->back()->with('success','Komisioner berhasil terhapus');	
    }
    public function editview($id)
    {
    	$kom = Komisioner::where('id', $id)->first();
    	return view('user.edit-komisioner', compact('kom'));
    }
    public function edit(Request $r,$id)
    {
    	$kom = Komisioner::findOrFail($id);
    	$kom->komisioner_name = $r->komisioner;
    	$kom->save();
    	return redirect()->back()->with('success','Direktorat berhasil dirubah');	
    }
}
