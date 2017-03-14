<?php
use Carbon\Carbon;

function getSatker(){
    if (Auth::check() AND Auth::user()->level == 'satker') {
        return Auth::user()->id;
    }

    return false;
}

function getBatasTanggalPelaporan($tahun = null, $triwulan = 1) {
    $rv = \App\TanggalLaporan::where('tahun', $tahun)
            ->where('triwulan', $triwulan)
            ->first();

    $rv->tanggal = Carbon::parse($rv->tanggal);

    return $rv;
}

function cekCurrentTriwulan()
{
    $rv = [];
    $triwulan = \App\TanggalLaporan::where('tahun', date('Y'))
                ->get();
    if ($triwulan) {
        foreach ($triwulan as $k => $v) {
            $awal[($k+1)] = \Carbon\Carbon::parse($v->sejak);
            $akhir[($k+1)] = \Carbon\Carbon::parse($v->hingga);
            $now[($k+1)] = \Carbon\Carbon::now();

            $rv['triwulan'][($k+1)] = [
                'batas_laporan' => $v->tanggal,
                'awal_triwulan' => $v->sejak,
                'akhir_triwulan' => $v->hingga
            ];

            if ($now[($k+1)]->between($awal[($k+1)], $akhir[($k+1)])) {
                $rv['current'] = $v;
            }
        }
    }

    return $rv;
}

//GET Percepatan Laporan per tahun
function cekPersenLaporan($tahun = null, $daftar_iku = null, $triwulan = null) {
    $r = \App\Persentase::where('tahun', $tahun)
        ->where('daftarindikator_id', $daftar_iku)
        ->where('triwulan', $triwulan)
        ->first();
    return $r;
}

function cekIkuPelaporan($tahun = null, $triwulan = null) {
    $slug = 'kecepatan_pelaporan#' . $tahun . '#' . $triwulan;
    $iku = \App\Iku::with('alat_ukur.definisi')
            ->where('namaprogram', $slug)
            ->where('daftarindikator_id', 1)
            ->first();
    return $iku;
}


//Cek Persen Serapan Anggaran
function cekPersenSerapan($tahun = null, $daftar_iku = null, $triwulan = null) {
    $r = \App\Persentase::where('tahun', $tahun)
        ->where('daftarindikator_id', $daftar_iku)
        ->where('triwulan', $triwulan)
        ->first();

    return $r;
}

function cekIkuSerapan($tahun = null, $triwulan = null) {
    $slug = 'serapan_anggaran#' . $tahun . '#' . $triwulan;
    $iku = \App\Iku::with('alat_ukur.definisi')
            ->where('namaprogram', $slug)
            ->where('daftarindikator_id', 2)
            ->first();
    return $iku;
}

function getPercentOfNumber($number, $percent){
    return ($percent / 100) * $number;
}



//CREATE AKUN TOKEN
function createToken($id, $level, $username) {
    if ($id == null OR $level == null OR $username == null) {
        return false;
    }

    $user = User::
    $secret = env('SKRT_KEY', 'rj"|:"<>HJFhgcdU857641923RYFGHolfs346346xckjhrw243rhYRjyf^%mnY%$#~()=-=-$%&~!@!@xvxjfw%$#!%@$&^@#d+');
    return $secret;
    // $user = \App\User::
}

function cek($token = null)
{
    /*|-------------------------------------------------
     *|!!!!!! Variable $secret JANGAN DIGANTI!!!!!
     *|-------------------------------------------------*/
    $secret = env('SCRT_KEY', '+_)(*&^%$#@!~<>?');
    // $secret = 'token.rahasia..';
    $data = [
        'status' => false,
        'data'  => '',
        'message' => ''
    ];
    
    if ($token == null) {
        $data['message'] = 'token kosong. ulangi';
        die(json_encode($data));
    }

    if (Hash::check($secret, $token)){
        $token = \App\ApiToken::where('token', $token)->get();

        if (count($token) <= 0) {
            $data['message'] = 'Token Invalid or Expired';
            die(json_encode($data));
        }

        $user = \App\User::where('username', $token->first()->username)->first();

        $data['status'] = true;
        $data['data'] = $user;
        $data['token'] = $token->first()->token;

        return $data;
    }
    
    $data['message'] = 'Token Salah Ulangi Kembali';

    die(json_encode($data));
}

function gen($username, $level)
{
    /*|-------------------------------------------------
     *|!!!!!! Variable $secret JANGAN DIGANTI!!!!!
     *|-------------------------------------------------*/
    $secret = env('SCRT_KEY', '+_)(*&^%$#@!~<>?');


    $api_token = new \App\ApiToken();

    $token = Hash::make($secret);
    $api_token->username = $username;
    $api_token->token = $token;

    $user = \App\User::updateOrCreate(
        [
            'username' => $username,
            'password' => null
        ],
        [
            'level' => $level
        ]
    );

    if($api_token->save()) {
        return ['token' => $api_token->token];
    }

    return 'Token Salah Ulangi Kembali';
}
