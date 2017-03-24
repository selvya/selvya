@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1 style="text-transform: uppercase">Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Rekap Self Assessment</h4>
                </div>
            </div>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{url('/')}}">Beranda</a></li>
        <li>Rekap Assessment</li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->
    <div class="block full">
        <!-- <div class="text-right">
            <a href="{{url('arsip/assessment')}}" class="btn btn-default" data-toggle="tooltip" title="Lihat Arsip Assessment"><i class="fa fa-eye"></i> Arsip</a>
        </div> -->
        <br>
        
        {{-- <div class="panel-heading">
            <form method="post" enctype="multipart/form-data" action="">
                <select name="tipe">
                    <option value="2" selected="selected">Kantor Pusat</option>
                    <option value="3">Kantor Regional</option>
                    <option value="4">Kantor KOJK</option>
                    <option value="5">OJK-wide</option>
                </select>&nbsp;                         Periode&nbsp;:&nbsp;&nbsp;
                <select name="month">
                    <option value="13" selected="selected">Januari - Maret</option>
                    <option value="14">April - Juni</option>
                    <option value="15">Juli - September</option>
                    <option value="16">Oktober-Desember</option>
                </select>&nbsp;<select name="year">
                <option value="2017" selected="selected">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
            </select>&nbsp;         
            <a class="btn btn-primary">Lihat&nbsp;<i class="fa fa-arrow-circle-o-right"></i></a>
        </form>
    </div> --}}
    {{--< div class="panel-body" style="padding:0px; margin-top:5px; margin-left:-1px;">
        <div class="container" style=" width:100%;margin-bottom: 5px;">
            <b>Detail Rekapitulasi:</b>
            <table>
                <tr>
                    <td style="background-color: #ececec;" align="center">
                        &nbsp;Sudah Submit&nbsp;<br>
                        <a href="#" class="btn btn-success">0</a>
                    </td>
                    <td>&nbsp;</td>
                    <td style="background-color: #ececec;" align="center">
                        &nbsp;Belum Submit&nbsp;<br>
                        <a href="#" class="btn btn-danger">66</a>
                    </td>
                </tr>
            </table>
        </div>
    </div> --}}
    
    <table class="table table-striped table-bordered table-hover" id="myTable">
        <thead>
            <tr>
                <th class="text-center">Username</th>
                <th class="text-center">Deputi Komisioner</th>
                <th class="text-center">Departemen</th>
                <th class="text-center">KOJK</th>
                <th class="text-center">Progress</th>
            </tr>
        </thead>
        <?php
        $triwulan = cekCurrentTriwulan();
        $report = \App\ReportAssessment::where('tahun',date('Y'))
        ->where('triwulan',$triwulan['current']['triwulan'])->get();
        $rp = [];
        foreach ($report as $key => $value) {
           $rp[] = $value->user_id;
       }
       $satker =  \App\User::whereNotIn('id',$rp)
       ->get();

       ?>
       <tbody>
        @foreach($satker as $data)
        <tr>
            <td class="text-center">{{$data->username}}</td>
            <td class="text-center">{{$data->deputi}}</td>
            <td class="text-center">{{$data->departemen}}</td>
            <td class="text-center">{{$data->kojk}}</td>
            <td class="text-center">
                <label class="btn btn-danger" id="bootBox0">Belum Submit</label>
            </td>
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