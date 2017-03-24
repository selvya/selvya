<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hashids;
use Session;
use App\User;
use App\ReportAssessment;

class ReviewController extends Controller
{
    //
    public function reviewPost(Request $r, $hashid)
    {
        $hashid = Hashids::connection('user')->decode($hashid);
        if (count($hashid) == 0) {
            Session::flash('alert-class', 'alert-danger');
            Session::flash('message', 'Invalid');
            return redirect()->back();
        }

        $usr = User::findOrFail($hashid[0]);
        // dd($usr);

        //Set All ReportAssesment to 0
        $ra = ReportAssessment::where('tahun', date('Y'))
                ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                ->where('user_id', $usr->id)
                ->update([
                    'final_status' => 0
                ]);

        Session::flash('alert-class', 'alert-success');
        Session::flash('message', 'Berhasil');
        return redirect()->back();
    }
}
