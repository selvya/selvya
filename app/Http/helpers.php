<?php
use Carbon\Carbon;

function getSatker(){
    // if (Auth::check()) {
    //     return Auth::user()->id;
    // }

    return 8;
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
            $now[($k+1)] = \Carbon\Carbon::parse('2017-12-07 00:00:00');

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
