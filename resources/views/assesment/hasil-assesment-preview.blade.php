<!DOCTYPE html><!--27.05.2015-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Summary Monitoring Program Budaya</title>

    <style type="text/css">
        @page {
            margin: 0cm 0cm; 
        }

        ::selection{ background-color: #E13300; color: white; }
        ::moz-selection{ background-color: #E13300; color: white; }
        ::webkit-selection{ background-color: #E13300; color: white; }

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

        #container{
            margin: 5px;
            border: 1px solid #D0D0D0;
            -webkit-box-shadow: 0 0 8px #D0D0D0;
        }
        .label{
            margin:2px;
        }
        .content{
            background-color:#ffffff;
            border: 1px solid #000;
            height: 100%;
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
                        <tr>
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
                        </tr>
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
                            <td colspan=5>
                                <div class="title">
                                    <p>
                                        Indikator {{$k+1}} : <b><u>{{$v->daftar_indikator->name}} [{{$v->daftar_indikator->persentase->where('tahun', $v->tahun)->where('triwulan', $v->triwulan)->first()->nilai}}%]</u></b>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <?php 
                            $reportnya  = \App\ReportAssessment::where('tahun',$t)->where('triwulan',$tw)->where('daftarindikator_id','3')->where('user_id',$usr->id)->where('final_status','1')->first();
                            $selfnya    = \App\SelfAssesment::where('tahun',$t)->where('triwulan',$tw)->where('reportassesment_id', $reportnya->id)->groupBy('iku_id')->get();
                            ?>
                            @foreach($selfnya as $a => $data)
                            <?php
                                $ikunya[$a] = \App\Iku::where('tahun',$t)->where('daftarindikator_id','3')->where('id',$data->iku_id)->get();
                            ?>
                                @foreach($ikunya[$a] as $b => $data_iku)
                                @php 
                                    $nama_iku[$b]       = collect(explode('#', $data_iku->namaprogram));
                                    $alatnya[$b]        = \App\AlatUkur::where('alatukur.iku_id',$data_iku->id)
                                                          ->join('selfassesment', 'alatukur.id','=','selfassesment.alatukur_id')
                                                          ->groupBy('selfassesment.alatukur_id')
                                                          ->get();
                                @endphp
                                    <tr><td colspan="5" ></td></tr>
                                    <tr><td colspan="5" ></td></tr>

                                    <tr>
                                        <td>
                                            Nama Program
                                        </td>
                                        <td colspan="4" class="content">
                                            <b>{{title_case(str_replace('_', ' ', $nama_iku[$b]->last()))}}</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tujuan Program
                                        </td>
                                        <td colspan="4" class="content">
                                            <b>{{$data_iku->tujuan}}</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi Program </td>
                                        <td colspan="4" class="content">{{$data_iku->keterangan}}</td>
                                    </tr>
                                        @foreach($alatnya[$b] as $c => $data_alat)
                                        <?php 
                                            $nama_alat[$c]       = collect(explode('#', $data_alat->name));  
                                        ?>
                                            <tr>
                                                <td>Nama Alat Ukur</td>
                                                <td colspan="4" class="content">
                                                    <b>{{title_case(str_replace('_', ' ', $nama_alat[$c]->last()))}}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Skala Nilai</td>
                                                <td colspan="4" class="content">
                                                    <b>{{$data_alat->skala_nilai}}</b>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td>Hasil</td>
                                            <td colspan="4" class="content">
                                                @if($nama_iku[$b]->last() == 'ojk_peduli')
                                                    {{$reportnya->hasil_peduli}}
                                                @elseif($nama_iku[$b]->last() == 'ojk_melayani')
                                                    {{$reportnya->hasil_melayani}}
                                                @else
                                                    {{$reportnya->hasil_inovatif}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>File Lampiran</td>
                                            <td colspan="4">
                                                <a href="{{asset('attachment/lampiran_program_budaya/'.$data->filelampiran)}}" style="text-decoration: none;">Download Lampiran</a>
                                            </td>
                                        </tr>
                                @endforeach
                            @endforeach
                    @endif
                    {{-- TUTUP Program Budaya --}}

                    @empty
                        --
                @endforelse

                <tr>
                    <td colspan=2 align="center">
                        <div id="chart_div1"></div>
                        <div id="chart_div_hidden" style="display:none;"></div>
                    </td>
                    <td>&nbsp;</td>
                    <td colspan=2 align="center">
                        <div id="chart_div2" style="height:220px"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan=5 align="center">
                        <a href="{{URL::current() . '?t=' . request('t') . '&p=' . request('p')}}&c=1" style="color: inherit;text-decoration: none;border: 1px solid #ddd;padding: 3px;-webkit-box-shadow: 10px 10px 13px -9px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 13px -9px rgba(0,0,0,0.75);
box-shadow: 10px 10px 13px -9px rgba(0,0,0,0.75); border-radius: 6px;font-size: 10px;">Cetak PDF Lembar Monitoring</a>
                        <button type="button">als/dhao;idhawk.ehwj</button>
                    </td>
                </tr>
            </table>
        </div>
        <p class="footer">Otoritas Jasa Keuangan</p>
    </div>
</body>
</html>