@extends('layout.master')

@section('content')

<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1>Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Grafik Budaya</h4>
                </div>
            </div>
        </div>
    </div>

    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{url('/')}}">Beranda</a></li>
        <li>Grafik Budaya</li>
    </ul>

    <div class="block full">
        <form method="get" action="" style="margin:0">
            <select name="kantor">
                @foreach($jenisKantor as $k => $v)
                    <option value="{{$v->kantor}}" @if($v->kantor == $kantor) selected @endif>{{$v->kantor}}</option>
                @endforeach
            </select>

            &nbsp;Period&nbsp;:&nbsp;&nbsp;

            <select name="triwulan">
                <option value="1" @if($tw == 1) selected @endif>I - Januari s/d Maret</option>
                <option value="2" @if($tw == 2) selected @endif>II - April s/d Juni</option>
                <option value="3" @if($tw == 3) selected @endif>III - Juli s/d September</option>
                <option value="4" @if($tw == 4) selected @endif>IV - Oktober s/d Desember</option>
            </select>

            &nbsp;

            <select name="tahun">
                @for($i = date('Y'); $i >= (date('Y') - 3); $i--)
                    <option value="{{$i}}" @if($i == $t) selected @endif>{{$i}}</option>
                @endfor
            </select>
            <div class="btn-group">
                <button type="submit" class="btn btn-default btn-sm" value="view">
                    Lihat &nbsp;
                    <i class="fa fa-eye"></i>
                </button>
                <button type="submit" class="btn btn-primary btn-sm" value="export">
                    Export &nbsp;
                    <i class="fa fa-file-excel-o"></i>
                </button>
            </div>
        </form>
        <hr>

        @forelse($map as $k => $v)
            <div id="con_{{$k+1}}">
                <h3 class="page-header">{{$k+1 . '. ' . $v->nama}}</h3>
                <div id="chartContainer_{{$k+1}}">
                    
                </div>
            </div>
        @empty
            <div class="alert alert-info">Belum ada pengelompokan map oleh admin</div>
        @endforelse
    </div>
</div>

@endsection

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<!--CHART BAR-->
<script type="text/javascript">
$(document).ready(function(){
    @forelse($map as $k => $v)
        Highcharts.chart('chartContainer_{{$k+1}}', {
            chart: {
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 1,
                    beta: 1,
                    depth: 100
                }
            },
            title: {
                text: '{{$v->nama}}'
            },
            plotOptions: {
                column: {
                    depth: 25
                }
            },
            xAxis: {
                @php
                    $str = '';
                    $nilaiAkhir = '';

                    foreach ($v->ms as $key => $value) {

                        $str .= "'" . trim($value->sat->nm_unit_kerja) . "', ";

                        $na = $value->sat->nilai_akhir
                            ->where('tahun', $t)
                            ->where('triwulan', $tw)
                            ->first();

                        if (count($na) > 0) {
                            $nilaiAkhir .= $na->nilai . ', ';
                        }else{
                            $nilaiAkhir .= '0, ';
                        }
                    }

                    $str = trim($str, ',');
                    $nilaiAkhir = trim($nilaiAkhir, ',');

                @endphp

                categories: [{!!$str!!}]
            },
            yAxis: {
                title: {
                    text: 'Nilai'
                },
                max: 100
            },
            series: [
                {
                    name: 'Reviewer',
                    data: [{!!$nilaiAkhir!!}]
                },
                {
                    name: 'Sel fAssesment',
                    data: [{!!$nilaiAkhir!!}]
                }
            ]
        });
    @empty
    @endforelse
});
</script>               
@endsection