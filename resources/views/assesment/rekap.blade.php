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
                            <form method="post" action="" id="revisicp">
                                <button type="submit" class="btn btn-sm shtct btn-warning">
                                    <i class="fa fa-pencil fa-2x"></i><br>Revisi Oleh CP
                                </button>
                                {{csrf_field()}}
                            </form>
                        </div>
                        <div class="col-md-6">
                            <a href="" target="_blank" id="lihat" class="btn btn-sm shtct btn-success">
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
            @if(Session::has('message'))
                <div class="alert {{Session::get('alert-class')}}">
                    {{Session::get('message')}}
                </div>
        @endif
        <!-- <div class="text-right">
            <a href="{{url('arsip/assessment')}}" class="btn btn-default" data-toggle="tooltip" title="Lihat Arsip Assessment"><i class="fa fa-eye"></i> Arsip</a>
        </div> -->
            <br>

            <div class="panel-heading" style="overflow: hidden;">
                <form method="get" enctype="multipart/form-data" action="">
                    <div class="col-md-2" style="padding: 0px;">
                        <select name="map" class="form-control">
                            <option value="2" selected="selected">Kantor Pusat</option>
                            <option value="3">Kantor Regional</option>
                            <option value="4">Kantor KOJK</option>
                            <option value="5">OJK-wide</option>
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
                <br><br><br>
                <div class="col-md-12" style="padding: 0px;">
                    <div class="btn btn-success">
                        @php
                            $triwulan = cekCurrentTriwulan();

                            //Ambil persentase
                            $t = (null != request('tahun')) ? request('tahun') : date('Y');
                            $tw = (null != request('triwulan')) ? request('triwulan') : $triwulan['current']->triwulan;
                            $persentase = \App\Persentase::where('tahun', $t)
                                    ->where('triwulan', $tw)
                                    ->where('nilai', '>', 0)
                                    ->count();

                            // if ($persentase == 0) {
                            //     die('Admin belum menginput persntase');
                            // }


                            $usr = \App\User::where('level','satker')->get();

                            $nilainya = \App\NilaiAkhir::where('tahun', $t)
                                        ->where('triwulan', $tw)
                                        ->groupBy('user_id')
                                        ->get();
                            $satkernya = \App\User::where('level','satker')->count();
                        @endphp
                        {{count($nilainya)}} <br>
                        Sudah Submit Assessment
                    </div>
                    <div class="btn btn-warning">
                        {{$satkernya-count($nilainya)}} <br>
                        Belum Submit Assessment
                    </div>
                </div>
            </div>

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


                <tbody>
                @foreach($usr as $data)
                    <tr>
                        <td class="text-center">{{$data->username}}</td>
                        <td class="text-center">{{$data->deputi}}</td>
                        <td class="text-center">{{$data->departemen}}</td>
                        <td class="text-center">{{$data->kojk}}</td>
                        <td class="text-center">
                            {{-- {{count($persentase)}} --}}
                            @if(
                                $persentase > 0
                                AND
                                $data->r_assesment
                                    ->where('tahun', $t)
                                    ->where('triwulan', $tw)
                                    ->where('final_status', 1)
                                ->count()
                                    == $persentase
                                )

                                <button type="button" class="btn btn-success ck" data-satker="{{$data->hashid}}">Sudah Submit</button>
                                    @else
                                        <label class="btn btn-danger disabled">Belum Submit</label>
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
            var lr = '{{url('revisicp')}}/' + c + '?t={{Hashids::connection('tahun')->encode($t)}}&p={{Hashids::connection('triwulan')->encode($tw)}}';
            var ll = '{{url('lihathasilassesment')}}/' + c + '?t={{Hashids::connection('tahun')->encode($t)}}&p={{Hashids::connection('triwulan')->encode($tw)}}';

            $('#revisicp').prop('action', '').prop('action', lr);
            $('#lihat').prop('href', '').prop('href', ll);
            $('#menuModal').modal('show');
        });
    </script>
@endsection