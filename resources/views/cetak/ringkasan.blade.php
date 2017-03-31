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
    <link rel="stylesheet" type="text/css" href="{{asset('css/chartis.css')}}">
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
            <table width="100%">
                @foreach($reportAssesment as $k => $v)
                    <tr>
                        {{-- <td style="font-size: 12px;">{{$k+1}}</td> --}}
                        <td style="font-size: 12px;text-align: right;width: 49%">{{$v->daftar_indikator->name}}</td>
                        <td style="font-size: 12px;text-align: center;width: 2%">:</td>
                        <td style="font-size: 12px;text-align: left;width: 49%">{{number_format($v->hasil, 1, '.', ',')}}% dari {{$v->persentase}}%</td>
                    </tr>
                @endforeach
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
        </div>
        <p class="footer">Otoritas Jasa Keuangan</p>
    </div>

    <script type="text/javascript" src="{{asset('js/chartis.js')}}"></script>
    <script type="text/javascript">
        var data = {
          // A labels array that can contain any sort of values
          labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
          // Our series array that contains series objects or in this case series data arrays
          series: [
            [5, 2, 4, 2, 0]
          ]
        };

        // As options we currently only set a static size of 300x200 px. We can also omit this and use aspect ratio containers
        // as you saw in the previous example
        var options = {
          width: 300,
          height: 200
        };

        // Create a new line chart object where as first parameter we pass in a selector
        // that is resolving to our chart container element. The Second parameter
        // is the actual data object. As a third parameter we pass in our custom options.
        new Chartist.Line('#chart', data, options);
    </script>
</body>
</html>