

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
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Detail Monitoring</h4>
                </div>
            </div>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{url('/')}}">Beranda</a></li>
        <li><a href="{{url('rekap-monitoring')}}">Rekap Monitoring</a></li>
        <li>Detail Monitoring</li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->
    <div class="block full">

        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td>{{$satker->username}}</td>
            </tr>
            <tr>
                <td>Deputi Komisioner</td>
                <td>:</td>
                <td>{{$satker->deputi_kom}}</td>
            </tr>
            <tr>
                <td>Satuan Kerja</td>
                <td>:</td>
                <td>{{$satker->satker}}</td>
            </tr>
            <tr>
                <td>Direktorat/KOJK</td>
                <td>:</td>
                <td>{{$satker->kojk}}</td>
            </tr>
        </table>
        <br>
        <div class="col-md-12 text-right" style="clear: both;">
            <a href="{{url('arsip-monitoring').'/'.$satker->hashid.'?t='.Hashids::connection('tahun')->encode($t)}}&p={{Hashids::connection('triwulan')->encode($tw)}}" class="btn btn-default">Arsip</a>
            <a href="{{url('tambah-monitoring').'/'.$satker->hashid.'?t='.Hashids::connection('tahun')->encode($t)}}&p={{Hashids::connection('triwulan')->encode($tw)}}" class="btn btn-success">Tambah</a>
        </div>
        <br><br><br>
        <table class="table table-striped table-bordebtn-danger table-hover" id="myTable">
            <thead>
                <tr>
                    <th class="text-center">Tanggal Monitoring</th>
                    <th class="text-center">Progress</th>
                    <th class="text-center">Pengaturan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($all as $data)
                <tr>
                    <td class="text-center">asas</td>
                    <td class="text-center">asas</td>
                    <td class="text-center">ajsh</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<!-- END Page Content -->
@endsection
@section('js')
<script src="{{asset('vendor/js/pages/tablesDatatables.js')}}"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>
@endsection