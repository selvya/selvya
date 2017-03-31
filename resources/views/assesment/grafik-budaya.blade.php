@extends('layout.master')
@section('css')

@endsection
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
    <!-- END Datatables Header -->

    <!-- Datatables Content -->
    <div class="block full">
        <?php
        $satker = \App\User::where('level','satker')->get();
        ?>
        <div style="overflow: hidden;">
            <form method="get" enctype="multipart/form-data" action="">
                <div class="col-md-2" style="padding: 0px;">
                    <select name="map" class="form-control select2">
                        @foreach($satker as $data)
                            <option value="{{$data->hashid}}">{{$data->username}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="triwulan" class="form-control">
                        <option value="1">I. Januari - Maret</option>
                        <option value="2">II. April - Juni</option>
                        <option value="3">III. Juli - September</option>
                        <option value="4">IV. Oktober-Desember</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="tahun" class="form-control">
                        @for($i = date('Y'); $i >= date('Y') - 2; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">Lihat <i class="fa fa-eye"></i></button>
                </div>
            </form>
        </div>
        <br><br>
        <div class="panel panel-default">
            <div class="panel-body" style="padding:0px; margin-top:5px; margin-left:-1px;">
                <div class="col-md-12">
                    <div id="container1"></div>
                </div>
            </div>
        </div>

    </div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<!-- END Page Content -->
@endsection
@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    $('.select2').select2();
</script>
<!--CHART BAR-->
@php

@endphp
<script type="text/javascript">
        //CHART 1
        Highcharts.chart('container1', {
            chart: {
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 1,
                    beta: 1,
                    depth: 70
                }
            },
            title: {
                text: 'Manajemen Strategis I'
            },
            plotOptions: {
                column: {
                    depth: 25
                }
            },
            xAxis: {
                categories: ['Pengembangan Keijakan Strategis', 'Komunikasi & Internasional' , 'Perencanaan Strategis, Manajemen Perubahan dan Sekretariat Dewan Komisioner' , 'Penyidikan Sektor Jasa Keuangan' , 'Pengawasan IKNB 2A']
            },
            yAxis: {
                title: {
                    text: 'Nilai'
                }
            },
            series: [{
                name: 'Reviewer',
                data: [10, 6 , 3,8,14],
            },
            {
                name: 'Satker',
                data: [10, 6 , 3,8,14],
            }
            ]
        });
</script>               
@endsection