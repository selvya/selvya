<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ManualBook;


class PanduanController extends Controller
{
    public function satker()
       {
           return view('panduan.panduan-satker');
       }
    public function reviewer()
       {
            return view('panduan.panduan-reviewer');
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
           if(!empty($r->upload_satker))
           {
            $extsat      = $r->file('upload_satker')->getClientOriginalExtension();     
            if (($extsat == 'doc') || ($extsat == 'docx') || ($extsat == 'ppt') || ($extsat == 'pptx') || ($extsat == 'pdf')) {
                $file = date('d-m-y').'- Manual Book Satker.'.$r->file('upload_satker')->getClientOriginalExtension();
                $r->file('upload_satker')->move(realpath(public_path("manual-book/satker")), $file);
                $manual->type = 'Satker';
                $manual->name = $file;
            }
            else{
                return redirect()->back()->with('error','Format yang anda masukan salah');
            }
           }
           elseif(!empty($r->upload_reviewer))
           {
            $extrev = $r->file('upload_reviewer')->getClientOriginalExtension();
            if (($extrev == 'doc') || ($extrev == 'docx') || ($extrev == 'ppt') || ($extrev == 'pptx') || ($extrev == 'pdf')) {
                $file = date('d-m-y').'- Manual Book Reviewer.'.$r->file('upload_reviewer')->getClientOriginalExtension();
                $r->file('upload_reviewer')->move(realpath(public_path("manual-book/reviewer")), $file);
                $manual->type = 'Reviewer';
                $manual->name = $file;
            }
            else{
                return redirect()->back()->with('error','Format yang anda masukan salah');
            }
           }
           $manual->save();
           return redirect()->back()->with('success','Berhasil Unggah Manual Book');
       }    
}
