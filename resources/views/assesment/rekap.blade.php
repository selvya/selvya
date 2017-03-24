@extends('layout.master')

@section('css')
    <style type="text/css">
        .shtct {
            width: 100%;
            margin-bottom: 20px;
        }
    </style>
@endsection

@section('content')
<div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{-- <h4 class="modal-title" id="menuModal">Pilih Jenis Perjalanan Dinas</h4> --}}
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <a href="" id="revisicp" class="btn btn-sm shtct btn-warning">
                    <i class="fa fa-pencil fa-2x"></i><br>Revisi Oleh CP
                </a>
            </div>
            <div class="col-md-6">
                <a href="" id="lihat" class="btn btn-sm shtct btn-success">
                    <i class="fa fa-eye fa-2x"></i><br>Lihat Hasil Self Assesment
                </a>
            </div>
        </div>
        </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1 >Salam <b>Perubahan</b></h1>
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

        @php
            $triwulan = cekCurrentTriwulan();
            
            // $report = \App\ReportAssessment::where('tahun',date('Y')) 
            //     ->where('triwulan',$triwulan['current']['triwulan'])
            //     ->get();
        
            // $rp = [];
            
            // foreach ($report as $key => $value) {
            //    $rp[] = $value->user_id;
            // }
            
            // $satker =  \App\User::whereNotIn('id',$rp)
            //             ->get();

            //Ambil persentase
            $persentase = \App\Persentase::where('tahun', date('Y'))
                            ->where('triwulan', $triwulan['current']->triwulan)
                            ->where('nilai', '>', 0)
                            ->count();

            if ($persentase == 0) {
                die('Admin belum menginput persntase');
            }


            $usr = \App\User::all();

        @endphp
       <tbody>
        @foreach($usr as $data)
            <tr>
                <td class="text-center">{{$data->username}}</td>
                <td class="text-center">{{$data->deputi}}</td>
                <td class="text-center">{{$data->departemen}}</td>
                <td class="text-center">{{$data->kojk}}</td>
                <td class="text-center">
                    {{-- {{count($persentase)}} --}}
                    @if($data->s_assesment->count() !== $persentase)
                        <label class="btn btn-danger disabled"">Belum Submit</label>
                    @else
                        <button type="button" class="btn btn-success ck" data-satker="{{$data->hashid}}">Sudah Submit</label>
                    @endif
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

<script type="text/javascript">
    $(document).on('click', '.ck', function() {
        var c = $(this).attr('data-satker');
        var lr = '{{url('revisicp')}}/' + c;
        var ll = '{{url('lihathasilassesment')}}/' + c;
        $('#revisicp').prop('href', '').prop('href', lr);
        $('#lihat').prop('href', '').prop('href', ll);
        $('#menuModal').modal('show');
    });
</script>
@endsection