<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class TokenController extends Controller
{
    //

    public function verify(Request $r)
    {
        $response = [
            'status' => false,
            'data' => '',
            'message' => ''
        ];

        if (null == $r->token) {
            $response['message'] = 'Unautorized';
            return response()->json($response, 403);
        }

        $ct = cek($r->token);

        if ($ct['status']) {
            Auth::loginUsingId($ct['data']['id']);
            return redirect('home');
        }
    }

    public function gen(Request $r)
    {
        $response = [
            'status' => false,
            'data' => '',
            'message' => ''
        ];

        if (null == $r->username OR null == $r->level) {
            $response['message'] = 'Unautorized';
            return response()->json($response, 403);
        }

        $t = gen($r->username, $r->level);

        if (count($t) == 1) {
            $ct = cek($t['token']);

            if ($ct['status']) {
                Auth::loginUsingId($ct['data']['id']);
                return redirect('home');
            }
        }

        return $t;
    }
}
