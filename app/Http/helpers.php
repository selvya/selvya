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

function gen($username)
{
    /*|-------------------------------------------------
     *|!!!!!! Variable $secret JANGAN DIGANTI!!!!!
     *|-------------------------------------------------*/
    $secret = env('SCRT_KEY', '+_)(*&^%$#@!~<>?');


    $api_token = new \App\ApiToken();

    $token = Hash::make($secret);
    $api_token->username = $username;
    $api_token->token = $token;

    $user = \App\User::where('username', $username)->first();

    if (count($user) == 0) {
        die(json_encode(['status' => false, 'data' => '', 'message' => 'Unautorized']));
    }

    if($api_token->save()) {
        return ['token' => $api_token->token];
    }

    return 'Token Salah Ulangi Kembali';
}


function hitungNilaiSerapan($tahun, $triwulan, $satker_id)
{
    $nilai = 1;

    $tahun = $tahun;

    $persen = cekPersenSerapan($tahun, 2, $triwulan);

    $iku = cekIkuSerapan($tahun, $triwulan);
    
    $anggaranTahun = \App\AnggaranTahun::where('user_id', $satker_id)
                    ->where('tahun', $tahun)
                    ->first();

    $totalAnggaran = $anggaranTahun->total_anggaran;

    $realisasi = 0;

    
    $semuaRealisasi = \App\AnggaranTriwulan::where('anggaran_tahun_id', $anggaranTahun->id)
                    ->where('user_id', $satker_id)
                    ->get();

    if ($semuaRealisasi[$triwulan-1]->realisasi == 0) {
        return $nilai;    
    }

    for ($i=1; $i <= $triwulan ; $i++) {
        $realisasi += $semuaRealisasi[$i-1]->realisasi;
    }

    $targetPersen = (float) getPercentOfNumber($totalAnggaran, $iku->alat_ukur[0]->definisi[5]->deskripsi);
    // return number_format($targetPersen, 2);
    
    //Tidak melapor
    if (! isset($realisasi) OR $realisasi == null) {
        return $nilai;
    }

    // dd((float) $iku->alat_ukur[0]->definisi[1]->deskripsi);
    // echo "Total Anggaran: " . $totalAnggaran . '<br>';
    // echo "Realisasi: " . $realisasi . '<br>';
    // echo "Definisi 1: " . (float) $iku->alat_ukur[0]->definisi[1]->deskripsi . '<br>';
    // echo "getPercentOfNumber: " . getPercentOfNumber($totalAnggaran, (float) $iku->alat_ukur[0]->definisi[1]->deskripsi) . '<br>';

    // exit();
    if (! isset($realisasi) OR $realisasi == null OR $realisasi == 0) {
        return $nilai;
    }

    if ($realisasi <= (float) getPercentOfNumber($totalAnggaran, (float) $iku->alat_ukur[0]->definisi[1]->deskripsi)) {
        $nilai = 2;
        return $nilai;
    }

    if ($realisasi > (float) getPercentOfNumber($totalAnggaran, (float) $iku->alat_ukur[0]->definisi[2]->deskripsi) AND $realisasi <= (float) getPercentOfNumber($totalAnggaran, $iku->alat_ukur[0]->definisi[3]->deskripsi)) {
        $nilai = 3;
        return $nilai;
    }

    if ($realisasi > (float) getPercentOfNumber($totalAnggaran, (float) $iku->alat_ukur[0]->definisi[3]->deskripsi) AND $realisasi <= (float) getPercentOfNumber($totalAnggaran, $iku->alat_ukur[0]->definisi[4]->deskripsi)) {
        $nilai = 4;
        return $nilai;
    }

    if ($realisasi > (float) getPercentOfNumber($totalAnggaran, (float) $iku->alat_ukur[0]->definisi[4]->deskripsi) AND $realisasi < (float) getPercentOfNumber($totalAnggaran, $iku->alat_ukur[0]->definisi[5]->deskripsi)) {
        $nilai = 5;
        return $nilai;
    }

    if ($realisasi >= (float) getPercentOfNumber($totalAnggaran, (float) $iku->alat_ukur[0]->definisi[5]->deskripsi)) {
        $nilai = 6;
        return $nilai;
    }
}
