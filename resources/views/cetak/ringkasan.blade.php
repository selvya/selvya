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

        table tr td {
            font-size: 10px;
        }
    </style>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
   <script type="text/javascript" src="{{asset('js/jq.js')}}"></script>

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
        </table>
        
        <div id="chart">
            
        </div>
        <br>
        <br>
        <br>

        <div style="100%">
            {{-- <table width="100%">
                @foreach($reportAssesment as $k => $v)
                    <tr>
                        <td style="font-size: 12px;text-align: right;width: 49%">{{$v->daftar_indikator->name}}</td>
                        <td style="font-size: 12px;text-align: center;width: 2%">:</td>
                        <td style="font-size: 12px;text-align: left;width: 49%">{{number_format($v->hasil, 1, '.', ',')}}% dari {{$v->persentase}}%</td>
                    </tr>
                @endforeach
            </table> --}}
            <table style="width: 100%">
                <tr>
                    <td align="center">
                        <div id="chart_div1"></div>
                        <div id="chart_div_hidden" style="display:none;"></div>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <div id="chart_div2" style="height:220px"></div>
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <br>
        <br>

        <table style="width: 100%">
            <tr>
                <td style="width: 30%"></td>
                <td style="width: 30%"></td>
                <td style="width: 30%">
                    <div style="font-size:10px;">
                        Laporan ini telah diketahui dan disetujui
                        <br>Pada tanggal: __/__/{{date('Y')}}

                        <div style="font-size:10px;margin-top: 65px;">
                            ______________________
                        </div>
                    </div>

                </td>
            </tr>
        </table>

        <div class="page-break"></div>

        </div>
        <table width="100%" border=0>
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
                        @php 
                            $reportnya  = \App\ReportAssessment::where('tahun',$t)->where('triwulan',$tw)->where('daftarindikator_id',3)->where('user_id', getSatker())->first();
                            // dd($reportnya);
                        @endphp

                        @if(count($reportnya) > 0)
                            
                            @php
                            // dd($reportnya);
                                $selfnya    = \App\SelfAssesment::where('tahun',$t)->where('triwulan',$tw)->where('reportassesment_id', $reportnya->id)->groupBy('iku_id')->get();

                            @endphp

                            @foreach($selfnya as $a => $data)
                                @php
                                    $ikunya[$a] = \App\Iku::where('tahun',$t)->where('daftarindikator_id','3')->where('id',$data->iku_id)->get();
                                @endphp

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
                        
                        @else
                            <tr>
                                <td>--Tidak melaporkan--</td>
                            </tr>
                        @endif
                    @endif
                {{-- TUTUP Program Budaya --}}
                

                @empty
                    --
            @endforelse
        </table>
        <p class="footer">Otoritas Jasa Keuangan</p>
    </div>

    <script type="text/javascript" src="{{asset('js/chartis.js')}}"></script>
<script type="text/javascript">
        google.load('visualization', '1', {packages:['corechart']});
        google.setOnLoadCallback(initialize);
        function initialize()   
        {
            drawVisualization();
            function drawVisualization() {
                drawBreakdown();
                drawOverall();
            } 
        }

        @php
            $colors = [
                '#1abc9c',
                '#3498db',
                '#9b59b6',
                '#f1c40f',
                '#e74c3c',
                '#c0392b',
                '#2c3e50'
            ];
            $d = '';
            foreach($reportAssesment as $k => $v){
                $d .= '[';
                $d .= '"' . $v->daftar_indikator->name . '",';
                $d .= $v->nilai . ',';
                $d .= '"' . $colors[$k] . '",';
                $d .= '"' . $v->nilai . '"';
                $d .= '],';
            }

            $d = trim($d, ',');
        @endphp
        function drawBreakdown() {
            var dataBreakdown = new google.visualization.DataTable();
            dataBreakdown.addColumn('string', 'Program');
            dataBreakdown.addColumn('number', 'Score');
            dataBreakdown.addColumn({type:'string', role:'style'});
            dataBreakdown.addColumn({type:'string', role:'annotation'});
            dataBreakdown.addRows([
               {!!$d!!}
            ]);
            var optionsBreakdown = {
                width:750,
                chartArea: {
                    left:300,
                    top:50,
                    width:400
                },
                title: 'Nilai per Program',
                vAxis: {
                    title: '',
                    textStyle: {
                        fontSize:10
                    }
                },
                hAxis: {
                    viewWindow: {
                        min: 0,
                        max: 6
                    },
                    ticks: [0, 1, 2, 3, 4, 5, 6]
                },
                legend: 'none'
            };
            var chartBreakdown_div = document.getElementById('chart_div1');
            var chartBreakdown_div_hidden = document.getElementById('chart_div_hidden');
            var chartBreakdown = new google.visualization.BarChart(chartBreakdown_div);
            google.visualization.events.addListener(chartBreakdown, 'ready', function (){
                //var imgUri = chartBreakdown.getImageURI();
                // to trigger a download, change the mime type:
                //var imgUriName = imgUri.replace(/^data:image\/png/, 'data:application/octet-stream');
                chartBreakdown_div.innerHTML = '<img src="' + chartBreakdown.getImageURI() + '">';
                chartBreakdown_div_hidden.innerHTML = '<img src="' + chartBreakdown.getImageURI() + '">';
                $("#htmlContentHidden").val('<img src="' + chartBreakdown.getImageURI() + '" style="width:600px">');
            });
            chartBreakdown.draw(dataBreakdown, optionsBreakdown);
        }
        
        function drawOverall() {        
            var dataOverall = new google.visualization.DataTable();
            dataOverall.addColumn('string', 'Program');
            dataOverall.addColumn('number', 'Score');
            dataOverall.addColumn({type:'string', role:'style'});
            dataOverall.addColumn({type:'string', role:'annotation'});
            dataOverall.addRows([["Nilai",{{number_format($reportAssesment->sum('hasil'), 1, '.', ',')}},"green","{{number_format($reportAssesment->sum('hasil'), 1, '.', ',')}}"]]);
            var optionsOverall = {
                width:200,
                height:180,
                chartArea: {
                    top:40,
                    height:'75%'
                },
                title: 'Total Nilai',
                vAxis: {
                    
                    viewWindow: {
                        min: 0,
                        max: 100
                    },
                    ticks: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100]
                },
                hAxis: {
                    title: '',
                    textStyle: {
                        fontSize:10
                    }
                },
                legend: 'none'
            };
            //var chartOverall = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
            //chartOverall.draw(dataOverall, optionsOverall);
            var chartOverall_div = document.getElementById('chart_div2');
            var chartOverall = new google.visualization.ColumnChart(chartOverall_div);
            google.visualization.events.addListener(chartOverall, 'ready', function (){
                chartOverall_div.innerHTML = '<img src="' + chartOverall.getImageURI() + '">';
            });
            chartOverall.draw(dataOverall, optionsOverall);
        }
    
        $(document).ready(function() {
           window.print(); 
        });
    </script>

</body>
</html>