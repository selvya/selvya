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
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Rekap Monitoring</h4>
                </div>
            </div>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{url('/')}}">Beranda</a></li>
        <li>Rekap Monitoring</li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="panel panel-default">
            <?php
            $triwulan = cekCurrentTriwulan();
            $all = \App\User::where('level','satker')->get();

            $semua = DB::table('monitoring')->where('monitoring.tahun',date('Y'))
            ->where('monitoring.triwulan',$triwulan['current']['triwulan'])
            ->join('users','monitoring.user_id','=','users.id')
            ->join('selfassesment','monitoring.selfassesment_id','=','selfassesment.id')
            ->get();

            // dd($all);

            // dd($all);
            $monitornya = \App\NilaiAkhirMonitor::where('tahun',date('Y'))->where('triwulan',cekCurrentTriwulan()['current']->triwulan)->groupBy('user_id')->get();
            $satkernya = \App\User::where('level','satker')->count();

            $t = (null != request('t')) ? Hashids::connection('tahun')->decode(request('t'))[0] : date('Y');
            $tw = (null != request('p')) ? Hashids::connection('triwulan')->decode(request('p'))[0] : $triwulan['current']->triwulan;

        // $final = \App\ReportAssessment::where('daftarindikator_id','2')
        // ->where('tahun',date('Y'))
        // ->where('triwulan',$triwulan['current']['triwulan'])
        // ->where('final_status','1')
        // ->join('users','report_assesment.user_id','=','users.id')
        // ->get();

        // $belumfinal = \App\ReportAssessment::where('daftarindikator_id','2')
        // ->where('tahun',date('Y'))
        // ->where('triwulan',$triwulan['current']['triwulan'])
        // ->where('final_status','0')
        // ->join('users','report_assesment.user_id','=','users.id')
        // ->get();
            ?>
            <div class="panel-heading">
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="col-md-2" style="padding: 0px;">
                        <select name="tipe" class="form-control">
                            <option value="2" selected="selected">Kantor Pusat</option>
                            <option value="3">Kantor Regional</option>
                            <option value="4">Kantor KOJK</option>
                            <option value="5">OJK-wide</option>
                        </select>
                    </div>
                    <div class="col-md-2" style="padding-right: 0px;">
                        <select name="month" class="form-control">
                            <option selected="selected">-- Periode --</option>
                            <option value="13">Januari - Maret</option>
                            <option value="14">April - Juni</option>
                            <option value="15">Juli - September</option>
                            <option value="16">Oktober-Desember</option>
                        </select>
                    </div>
                    <div class="col-md-2" style="padding-right: 0px;">
                        <select name="year" class="form-control">
                            <option value="2017" selected="selected">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-primary">Lihat&nbsp;<i class="fa fa-arrow-circle-o-right"></i></a>
                    </div>
                </form>
                <br><br><br>
                <div class="">
                    <b>Rekapitulasi:</b> <br>
                    <span class="btn btn-success"><big>{{count($monitornya)}}</big><br><b>Sudah di Monitor</b></span>
                    <span class="btn btn-danger"><big>{{$satkernya - count($monitornya)}}</big><br><b>Belum di Monitor</b></span>
                </div>
            </div>
            <table class="table table-striped table-bordebtn-danger table-hover" id="myTable">
                <thead>
                    <tr>
                        <th class="text-center">Username</th>
                        <th class="text-center">Deputi Komisioner</th>
                        <th class="text-center">Departemen</th>
                        <th class="text-center">KOJK</th>
                        <th class="text-center">Status Monitoring</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all as $data)
                    <?php
                    $monitoring = \App\Monitoring::where('tahun',date('Y'))->where('triwulan', $triwulan['current']['triwulan'])->where('user_id',$data->id)->first();
                    ?>
                    <tr>
                        <td class="text-center">{{$data->username}}</td>
                        <td class="text-center">{{$data->deputi_kom}}</td>
                        <td class="text-center">{{$data->departemen}}</td>
                        <td class="text-center">{{$data->kojk}}</td>
                        <td class="text-center">
                            @if($monitoring)
                                <button type="button" class="btn btn-success sudah" data-id="{{$data->hashid}}" data-tombol="{{count($monitoring)}}">Sudah Dilakukan monitoring</button>
                            @else
                                <button type="button" class="btn btn-danger belum" data-id="{{$data->hashid}}">Belum Dilakukan monitoring</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="Modal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Notifikasi</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <a href="" class="btn btn-success" id="hasil">Lihat Hasil Assessment</a>
                                        <a href="" class="btn btn-info" id="lakukan">Lakukan Monitoring</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </tbody>
            </table>
        </div>
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
    $(document).on('click', '.sudah', function() {
        var id = $(this).attr('data-id');
        var datatombol = $(this).attr('data-tombol');
        var lakukan = '{{url('detail-monitoring')}}/' + id + '?t={{Hashids::connection('tahun')->encode($t)}}&p={{Hashids::connection('triwulan')->encode($tw)}}';
        var hasil = '{{url('lihathasil-monitoring')}}/' + id + '?t={{Hashids::connection('tahun')->encode($t)}}&p={{Hashids::connection('triwulan')->encode($tw)}}';

        // console.log(datatombol);

        if (datatombol > 0) {
            $('#hasil').css('display','inline-block');
        }else{
            $('#hasil').css('display','none');
        }

        $('#lakukan').prop('href', '').prop('href', lakukan);
        $('#hasil').prop('href', '').prop('href', hasil);
        $('#Modal').modal('show');
    });

    $(document).on('click', '.belum', function() {
        var id = $(this).attr('data-id');
        var datatombol = $(this).attr('data-tombol');
        var lakukan = '{{url('detail-monitoring')}}/' + id + '?t={{Hashids::connection('tahun')->encode($t)}}&p={{Hashids::connection('triwulan')->encode($tw)}}';
        var hasil = '{{url('lihathasil-monitoring')}}/' + id + '?t={{Hashids::connection('tahun')->encode($t)}}&p={{Hashids::connection('triwulan')->encode($tw)}}';

        if (datatombol > 0) {
            $('#hasil').css('display','inline-block');
        }else{
            $('#hasil').css('display','none');
        }
        $('#lakukan').prop('href', '').prop('href', lakukan);
        $('#hasil').prop('href', '').prop('href', hasil);
        $('#Modal').modal('show');
    });
</script>
@endsection