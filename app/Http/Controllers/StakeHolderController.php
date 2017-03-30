<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hashids;

class StakeHolderController extends Controller
{
    //

    public function hapus(Request $r)
    {
        $resp = [
            'status' => false,
            'data' => [],
            'message' => ''
        ];

        $hash = Hashids::connection('stakeholder')->decode($r->hash);

        if (count($hash) == 0) {
            return response()->json($resp, 200);
        }

        $stakeholder = \App\StakeHolder::findOrFail($hash[0]);
        $stakeholder->delete();

        $resp['status'] = true;
        $resp['data'] = $stakeholder;

        return response()->json($resp, 200);
    }
}
