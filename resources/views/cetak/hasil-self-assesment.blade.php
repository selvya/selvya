<!DOCTYPE html><!--27.05.2015-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Summary Monitoring Program Budaya</title>

    <style type="text/css">
        @page {
            margin: 0cm 0cm; 
        }

        /*::selection{ background-color: #E13300; color: white; }
        ::moz-selection{ background-color: #E13300; color: white; }
        ::webkit-selection{ background-color: #E13300; color: white; }
*/
        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #000;
            width:95%;
        }

        #header {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            text-align: center;
            font-size: 24px;
            color: #a32020;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        #body{
            margin: 5px 15px 5px 15px;
        }

        p.footer{
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }

        /*#container{
            margin: 5px;
            border: 1px solid #D0D0D0;
            -webkit-box-shadow: 0 0 8px #D0D0D0;
        }*/
        .label{
            margin:2px;
        }
        .content{
            background-color:#ffffff;
            border: 1px solid #000;
            /*height: 100%;*/
        }
        .title{
            margin-top: 15px;
            background-color:#bfbfbf;
        }
        .subtitle{
            margin-top: 0px;
        }
        .content p, .title p, .subtitle p, .label p{
            margin:2px;
        }
    </style>
</head>
<body>
    <div id="container">
        <div id="header">
            <table width="100%" border=0>
                <tr>
                    <td>
                        <img src="{{asset('img/logo1.png')}}" height="50">
                    </td>
                    <td align="center" width="80%"><b>Hasil Self Assesment</b></td>
                    <td>
                        <img src="{{asset('img/inpresive.png')}}" height="50">
                    </td>
                </tr>
            </table>
        </div>
        <div id="body">

            <table width="100%" border=0>
                <tr>
                    <td>
                        <div class="label">
                            <p>
                                Periode:
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="content">
                            <p>
                                {{\Carbon\Carbon::parse($triwulan['current']->sejak)->format('F') . ' - ' . \Carbon\Carbon::parse($triwulan['current']->hingga)->format('F')}}
                            </p>
                        </div>
                    </td>
                    <td>
                        &nbsp;
                    </td>
                    <td>
                        <div class="label">
                            <p>
                                Tahun:
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="content">
                            <p>
                                {{date('Y')}}
                            </p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="label">
                            <p>
                                Deputi Komisioner:
                            </p>
                        </div>
                    </td>
                    <td colspan=4>
                        <div class="content">
                            <p>
                                {{ucwords($usr->nm_deputi_komisioner)}}
                            </p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="label">
                            <p>
                                Departemen:
                            </p>
                        </div>
                    </td>
                    <td colspan=4>
                        <div class="content">
                            <p>
                                {{ucwords($usr->nm_unit_kerja)}}
                            </p>
                        </div>
                    </td>
                </tr>


                @forelse($reportAssesment as $k => $v)

                    {{-- Serapan Anggaran --}}
                    @if($v->daftarindikator_id == 2)
                        <tr>
                            <td colspan=5>
                                <div class="title">
                                    <p>
                                        Indikator {{$k+1}} : <b><u>{{$v->daftar_indikator->name}} [{{$v->daftar_indikator->persentase->where('tahun', $v->tahun)->where('triwulan', $v->triwulan)->first()->nilai}}%]</u></b>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="bottom">
                                <div class="label">
                                    <p>
                                        Nama Program:
                                    </p>
                                </div>
                            </td>
                            <td colspan=4>
                                <div class="content">
                                    <p>
                                        {{$v->daftar_indikator->name}}
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="bottom">
                                <div class="label">
                                    <p>
                                        Nilai <i>Self Assessment</i>:
                                    </p>
                                </div>
                            </td>
                            <td colspan=4>
                                <div class="content">
                                    <p>

                                        @php
                                            $auA = \App\AlatUkur::with('definisi')
                                            ->where('name', 
                                                    'serapan_anggaran#' . 
                                                    $v->tahun . '#' .
                                                    $v->triwulan
                                            )->first();

                                            $angg = \App\AnggaranTahun::with('anggaran_triwulan')
                                                    ->where('tahun', $v->tahun)
                                                    ->where('user_id', $v->user_id)
                                                    ->first();
                                        @endphp

                                        {{$v->nilai . ' (' . ($v->hasil) . '% dari ' . $v->persentase . '%)'}}
                                    
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="bottom">
                                <div class="label">
                                    <p>
                                        Total Anggaran :
                                    </p>
                                </div>
                            </td>
                            <td colspan=4>
                                <div class="content">
                                    <p>
                                        Rp. {{number_format($angg->total_anggaran, 0, ',', '.')}},-
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="bottom">
                                <div class="label">
                                    <p>
                                        Realisasi :
                                    </p>
                                </div>
                            </td>
                            <td colspan=4>
                                <div class="content">
                                    <p>
                                        Rp. {{number_format($angg->anggaran_triwulan->where('triwulan', $v->triwulan)->first()->realisasi, 0, ',', '.')}},-
                                    </p>
                                </div>
                            </td>
                        </tr>
                        {{-- <tr>
                            <td valign="bottom">
                                <div class="label">
                                    <p>
                                        Lampiran :
                                    </p>
                                </div>
                            </td>
                            <td colspan=4>

                                @if($angg->anggaran_triwulan->where('triwulan', $v->triwulan)->first()->file != null)
                            
                                    <a href="{{url('attachment/lampiran_anggaran')}}/{{$angg->anggaran_triwulan->where('triwulan', $v->triwulan)->first()->file}}?dl=1" target="_blank" class="btn yellow">
                                        Download Lampiran
                                    </a>
                            
                                @else
                                    <em>-TIDAK ADA LAMPIRAN-</em>
                                @endif
                            
                            </td>
                        </tr> --}}
                    @endif
                    
                    {{-- Partisipasi Pimpinan --}}
                    @if($v->daftarindikator_id == 4)

                        <tr>
                            <td colspan=5>
                                <div class="title">
                                    <p>
                                        Indikator {{$k+1}} : <b><u>{{$v->daftar_indikator->name}} [{{$v->daftar_indikator->persentase->where('tahun', $v->tahun)->where('triwulan', $v->triwulan)->first()->nilai}}%]</u></b>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="bottom">
                                <div class="label">
                                    <p>
                                        Nama Program:
                                    </p>
                                </div>
                            </td>
                            <td colspan=4>
                                <div class="content">
                                    <p>
                                        {{$v->daftar_indikator->name}}
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="bottom">
                                <div class="label">
                                    <p>
                                        Nilai <i>Self Assessment</i>:
                                    </p>
                                </div>
                            </td>
                            <td colspan=4>
                                <div class="content">
                                    <p>

                                        @php
                                            $auA = \App\AlatUkur::with('definisi')
                                            ->where('name', 
                                                    'partisipasi_pimpinan#' . 
                                                    $v->tahun . '#' .
                                                    $v->triwulan
                                            )->first();
                                        @endphp

                                        {{$v->nilai . ' (' . ($v->hasil) . '% dari ' . $v->persentase . '%)'}}
                                    
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="bottom">
                                <div class="label">
                                    <p>
                                        Peran Pimpinan :
                                    </p>
                                </div>
                            </td>
                            <td colspan=4>
                                <div class="content">
                                    <p>
                                        {{($v->partisipasi != null) ? $v->partisipasi : '-'}}
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="bottom">
                                <div class="label">
                                    <p>
                                        Deskripsi :
                                    </p>
                                </div>
                            </td>
                            <td colspan=4>
                                <div class="content">
                                    <p>
                                        {{($v->Deskripsi != null) ? $v->deskripsi : '-'}}
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endif

                    {{-- Kecepatan Pelaporan --}}
                    @if($v->daftarindikator_id == 1)
                        <tr>
                            <td colspan=5>
                                <div class="title">
                                    <p>
                                        Indikator {{$k+1}} : <b><u>{{$v->daftar_indikator->name}} [{{$v->daftar_indikator->persentase->where('tahun', $v->tahun)->where('triwulan', $v->triwulan)->first()->nilai}}%]</u></b>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="bottom">
                                <div class="label">
                                    <p>
                                        Nama Program:
                                    </p>
                                </div>
                            </td>
                            <td colspan=4>
                                <div class="content">
                                    <p>
                                        {{$v->daftar_indikator->name}}
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="bottom">
                                <div class="label">
                                    <p>
                                        Nilai <i>Self Assessment</i>:
                                    </p>
                                </div>
                            </td>
                            <td colspan=4>
                                <div class="content">
                                    <p>

                                        @php
                                            $auA = \App\AlatUkur::with('definisi')
                                            ->where('name', 
                                                    'kecepatan_pelaporan#' . 
                                                    $v->tahun . '#' .
                                                    $v->triwulan
                                            )->first();

                                            $batas = getBatasTanggalPelaporan($v->tahun, $v->triwulan);
                                        @endphp

                                        {{$v->nilai . ' (' . ($v->hasil) . '% dari ' . $v->persentase . '%)'}}
                                    
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="bottom">
                                <div class="label">
                                    <p>
                                        Tgl. Batas Melapor :
                                    </p>
                                </div>
                            </td>
                            <td colspan=4>
                                <div class="content">
                                    <p>
                                        <code>{{$batas->tanggal->format('d F Y h:i:s')}}</code>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="bottom">
                                <div class="label">
                                    <p>
                                        Tgl. Melapor :
                                    </p>
                                </div>
                            </td>
                            <td colspan=4>
                                <div class="content">
                                    <p>
                                        <code>{{\Carbon\Carbon::parse($v->updated_at)->format('d F Y h:i:s')}}</code>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="bottom">
                                <div class="label">
                                    <p>
                                        Selisih :
                                    </p>
                                </div>
                            </td>
                            <td colspan=4>
                                <div class="content">
                                    <p>
                                        <code>{{\Carbon\Carbon::parse($v->updated_at)->diffInDays($batas->tanggal, true)}} hari</code>
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endif

                    {{-- Program Budaya --}}
                    @if($v->daftarindikator_id == 3)
                        <tr>
                            <td colspan=4>
                                <div class="title">
                                    <p>
                                        Indikator {{$k+1}} : <b><u>{{$v->daftar_indikator->name}} [{{$v->daftar_indikator->persentase->where('tahun', $v->tahun)->where('triwulan', $v->triwulan)->first()->nilai}}%]</u></b>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="bottom">
                                <div class="label">
                                    <p>
                                       Tujuan Program:
                                    </p>
                                </div>
                            </td>
                            <td colspan=4>
                                <div class="content">
                                    <p>
                                        {{$v->daftar_indikator->name}}
                                    </p>
                                </div>
                            </td>
                        </tr>
                        @foreach($v->s_assesment as $kuy => $vals)
                            @php 
                                $nama  = collect(explode('#', $vals->iku->namaprogram));
                            @endphp

                            <tr>
                                <td colspan="2">Nama Program : &nbsp;&nbsp; <b>{{title_case(str_replace('_', ' ', $nama->last()))}}</b></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Deskripsi Program :</td>
                                <td colspan="4" class="content">{{$vals->deskripsi}}</td>
                            </tr>
                            <tr>
                                <td>File Lampiran</td>
                                <td colspan="4" class="content">{{$vals->filelampiran}}</td>
                            </tr>

                                @foreach($vals->iku->alat_ukur as $alatnya => $data_alat )

                                    @php
                                        $nama_alat  = collect(explode('#', $data_alat->name));
                                    @endphp

                                    <tr>
                                        <td>Alat Ukur :</td>
                                        <td colspan="4"  class="content"><b>{{title_case(str_replace('_', ' ', $nama_alat->last()))}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Skala Nilai :</td>
                                        <td colspan="4" class="content">{{$vals->skala_nilai}}</td>
                                    </tr>
                                @endforeach
                        @endforeach
                    @endif

                    @empty
                        --
                @endforelse
            </table>
        </div>
        <p class="footer">Otoritas Jasa Keuangan</p>
    </div>
</body>
</html>