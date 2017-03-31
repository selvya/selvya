<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapping;


class MappingController extends Controller
{
  public function report()
  {
    $map = Mapping::orderBy('urutan')->paginate(10);
    return view('mapping.map-report', compact('map'));
  }    
  public function tambah_mapping()
  {
    return view('mapping.tambah');
  }
  public function proses_tambah_mapping(Request $r){
    $map        = new Mapping;
    $map->nama  = $r->nama;
    $map->kantor = $r->kantor;
    $map->urutan = $r->urutan;
    $map->save();

    return redirect('map-report')->with('success', 'Mapping berhasil ditambahkan');
  }
  public function editmapping($id)
  {
    $map = Mapping::findOrFail($id); 
    return view('mapping.edit', compact('map'));
  }
  public function proseseditmapping(Request $r,$id)
  {
    $map = Mapping::findOrFail($id);
    $map->nama = $r->nama;
    $map->kantor = $r->kantor;
    $map->urutan = $r->urutan;
    $map->save();
    return redirect()->back()->with('success', 'Mapping berhasil di ubah');
  }
  public function detailnya(Request $r,$id)
  {
    $map = Mapping::findOrFail($id);
    $map = Mapping::findOrFail($id);
    return view('mapping.list', compact('map'));
  }
  public function hapus($id)
  {
    $map = Mapping::findOrFail($id);
    $map->delete(); 
    return redirect()->back()->with('success', 'Mapping berhasil di hapus');
  }
}
