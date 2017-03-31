<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapping;
use App\MappingSatker;
use DB;


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
  public function prosesaddsatkernya(Request $r,$id)
  {$map        = new MappingSatker;
    $map->user_id  = $r->satker;
    $map->mapping_id = $id;
    $map->save();

    return redirect()->back()->with('success', 'Berhasil  menambah satker');
  }
  public function detailnya(Request $r,$id)
  {
    $map = Mapping::findOrFail($id);
    $map_sat = MappingSatker::join('users','mapping_satker.user_id','users.id')->where('mapping_id',$id)->orderBy('mapping_satker.updated_at')->paginate(10);;
    return view('mapping.detail', compact('map','map_sat'));
  }
  public function addsatkernya(Request $r,$id)
  {
			$user = DB::table('users')
			->where('nm_unit_kerja','!=','""')
            ->get();
    $map = Mapping::findOrFail($id);
    return view('mapping.susunsatker', compact('user','map'));
  }
  public function prosesdeletesatkernya(Request $r,$id)
  {
    $map = Mapping::findOrFail($id);
    $map_sat = MappingSatker::where('mapping_id',$id)->first();
    return view('mapping.detail', compact('map','map_sat'));
  }
  public function hapus($id)
  {
    $map = Mapping::findOrFail($id);
    $map->delete(); 
    return redirect()->back()->with('success', 'Mapping berhasil di hapus');
  }
}
