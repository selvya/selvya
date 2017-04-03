<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ManualBook;


class PanduanController extends Controller
{
    public function satker()
       {
           $data = ManualBook::where('type','Satker')->orderBy('id','DESC')->first();
           return view('panduan.panduan-satker', compact('data'));
       }
    public function reviewer()
       {
            $data = ManualBook::where('type','Reviewer')->orderBy('id','DESC')->first();
            return view('panduan.panduan-reviewer',compact('data'));
       }   
    public function uploadsatkerview()
       {    
           $data = ManualBook::where('type','Satker')->orderBy('id','DESC')->first();
           return view('panduan.upload-panduan-satker', compact('data'));
       }
    public function uploadreviewer()
       {
           $data = ManualBook::where('type','Reviewer')->orderBy('id','DESC')->first();
           return view('panduan.upload-dmpb', compact('data'));
       }
    public function uploadpost(Request $r)
       {
           $manual      = new ManualBook;

           //UPLOAD SATKER
           if(!empty($r->upload_satker))
           {
            $extsat      = $r->file('upload_satker')->getClientOriginalExtension();     
            if (($extsat == 'doc') || ($extsat == 'docx') || ($extsat == 'ppt') || ($extsat == 'pptx') || ($extsat == 'pdf')) {
                $file = date('d-m-y').'-Manual Book Satker.'.$r->file('upload_satker')->getClientOriginalExtension();
                $r->file('upload_satker')->move(realpath(public_path("manual-book/satker")), $file);
                $manual->type = 'Satker';
                $manual->name = $file;
            }else{
                return redirect()->back()->with('error','Format yang anda masukan salah');
            }
           }

           //UPLOAD REVEIWER
           elseif(!empty($r->upload_reviewer))
           {
            $extrev = $r->file('upload_reviewer')->getClientOriginalExtension();
            if (($extrev == 'doc') || ($extrev == 'docx') || ($extrev == 'ppt') || ($extrev == 'pptx') || ($extrev == 'pdf')) {
                $file = date('d-m-y').'-Manual Book Reviewer.'.$r->file('upload_reviewer')->getClientOriginalExtension();
                $r->file('upload_reviewer')->move(realpath(public_path("manual-book/reviewer")), $file);
                $manual->type = 'Reviewer';
                $manual->name = $file;
            }else{
                return redirect()->back()->with('error','Format yang anda masukan salah');
            }
           }

           //UPLOAD CATATAN
           elseif(!empty($r->upload_catatan))
           {
             $triwulan = cekCurrentTriwulan();
             $t = (null != request('t')) ? Hashids::connection('tahun')->decode(request('t'))[0] : date('Y');
             $tw = (null != request('p')) ? Hashids::connection('triwulan')->decode(request('p'))[0] : $triwulan['current']->triwulan;
            $extcat = $r->file('upload_catatan')->getClientOriginalExtension();
              if (($extcat == 'doc') || ($extcat == 'docx') || ($extcat == 'ppt') || ($extcat == 'pptx') || ($extcat == 'pdf')) {
                  $file = 'Catatan_Dinas_'.$t.'_'.$tw.'.'.$r->file('upload_catatan')->getClientOriginalExtension();
                  $r->file('upload_catatan')->move(realpath(public_path("manual-book/dinas")), $file);
                  $manual->type = 'Dinas';
                  $manual->name = $file;
              }
              else{
                  return redirect()->back()->with('error','Format yang anda masukan salah');
              }
           }

           $manual->save();
           return redirect()->back()->with('success','Berhasil Unggah Manual Book');
       }    
       public function uploaddinas()
       {
           $triwulan = cekCurrentTriwulan();
           $t = (null != request('t')) ? Hashids::connection('tahun')->decode(request('t'))[0] : date('Y');
           $tw = (null != request('p')) ? Hashids::connection('triwulan')->decode(request('p'))[0] : $triwulan['current']->triwulan;
           $data = ManualBook::where('type','Dinas')->orderBy('created_at','DESC')->first();
           return view('panduan.upload-catatan', compact('data'));
       }
}
