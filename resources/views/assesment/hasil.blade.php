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
                        <h1>Salam <b>Perubahan</b></h1>
                        <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Hasil Assessment</h4>
                    </div>
                </div>
            </div>
        </div>
        <ul class="breadcrumb breadcrumb-top">
            <li><a href="{{url('/')}}">Beranda</a></li>
            <li>Hasil Assessment</li>
        </ul>
        <!-- END Datatables Header -->

        <!-- Datatables Content -->
        <div class="block full">

            <form method="get" enctype="multipart/form-data" action="">
                <div class="col-md-2" style="padding: 0px;">
                    <select name="map" class="form-control input-sm">
                        <option value="2" selected="selected">Kantor Pusat</option>
                        <option value="3">Kantor Regional</option>
                        <option value="4">Kantor KOJK</option>
                        <option value="5">OJK-wide</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="triwulan" class="form-control input-sm">
                        <option value="1">I. Januari - Maret</option>
                        <option value="2">II. April - Juni</option>
                        <option value="3">III. Juli - September</option>
                        <option value="4">IV. Oktober-Desember</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="tahun" class="form-control input-sm">
                        @for($i = date('Y'); $i >= date('Y') - 2; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block btn-sm">Lihat <i class="fa fa-eye"></i></button>
                </div>
            </form>
            <br>
            <br>
            <br>

            @if($persentase->count() > 0)
                <h6><b>Nilai Rata-Rata per Program:</b></h6>

                {{-- Rata-rata --}}
                @php
                    $tot = 0;
                @endphp

                @foreach($persentase as $key => $val)
                    <a href="javascript:void(0)" class="btn btn-warning">
                        <b>{{$val->daftar_indikator->name}}</b>
                        <br>
                        @php
                            $ratarata[$key] = 0;
                            $tamp[$key] = \App\ReportAssessment::where('daftarindikator_id', $val->daftarindikator_id)
                                        ->where('tahun', $t)
                                        ->where('triwulan', $tw)
                                        ->where('final_status', 1)
                                        ->avg('nilai');
                            $tot += $tamp[$key];
                        @endphp
                        <big>{{number_format($tamp[$key], 1, '.', ',')}}</big>
                    </a>
                @endforeach


                <a href="javascript:void(0)" class="btn btn-primary">
                    <b>Total</b><br>

                    <big>{{number_format($tot / (($persentase->count() == 0) ? 1 : $persentase->count()), 1, '.', ',')}}</big>
                </a>
                <br><br>


                <table class="table table-striped table-bordered table-hover" id="myTable">
                    <thead>
                    <tr>
                        <td rowspan="2" style="vertical-align: middle; background: #3498db;color: #fff;padding:2px">
                            <b>No.</b>
                        </td>
                        <td rowspan="2" style="vertical-align: middle; background: #3498db;color: #fff;padding:2px">
                            <b>Username</b>
                        </td>
                        <td rowspan="2" style="vertical-align: middle; background: #3498db;color: #fff;padding:2px">
                            <b>Nilai</b>
                        </td>

                        @foreach($persentase as $v)
                            <td class="text-center" style="vertical-align: middle;background: #3498db;color: #fff;padding:2px;" @if($v->daftar_indikator->id == 3) colspan="3" @else rowspan="2" @endif>
                                <h5>
                                    <b>
                                        {{$v->daftar_indikator->name}}
                                        <br>
                                        {{$v->nilai}}
                                    </b>
                                </h5>
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach($persentase as $v)
                            @if($v->daftar_indikator->id == 3)
                                <td style="vertical-align: middle;background: #3498db;color: #fff;padding:2px"><b>OJK Inovatif</b></td>
                                <td style="vertical-align: middle;background: #3498db;color: #fff;padding:2px"><b>OJK Melayani</b></td>
                                <td style="vertical-align: middle;background: #3498db;color: #fff;padding:2px"><b>OJK Peduli</b></td>
                            @endif
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $k => $data)
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>{{$data->username}}</td>

                            <td class="text-center">
                                @php
                                    $n[$k] = $data->nilai_akhir->where('tahun', $t)->where('triwulan', $tw)->first();
                                    $nn[$k] = $n[$k] == null ? 0 : $n[$k]->nilai / 100 * 6;
                                    $active = ($data->r_assesment
                                        ->where('tahun', $t)
                                        ->where('triwulan', $tw)
                                        ->where('final_status', 1)
                                        ->count()
                                        == count($persentase)) ? '' : 'disabled';
                                @endphp

                                <button class="btn btn-block n" {{$active}}  data-id="{{$data->hashid}}" style="color:#fff;background: {{warnai($nn[$k])}}">{{$nn[$k]}}</button>
                            </td>

                            @foreach($persentase as $key => $persen)

                                {{-- Program Budaya --}}
                                @if($persen->daftar_indikator->id == 3)

                                    {{-- Inovatif --}}
                                    <td class="text-center">
                                        @php
                                            $nilai[$k][$key] = 0;

                                            $r[$k][$key] = $data->r_assesment
                                                                ->where('tahun', $t)
                                                                ->where('triwulan', $tw)
                                                                ->where('daftarindikator_id', 3)
                                                                ->first();

                                            if (count($r[$k][$key]) > 0) {

                                                $rs[$k][$key] = $r[$k][$key]->s_assesment
                                                                ->where('iku', function($q)
                                                                {
                                                                    $q->where('namaprogram', 'pelaksanaan_program_budaya#' . $t. '#' . $tw . '#ojk_inovatif');
                                                                })
                                                                ->first();

                                                if (count($rs[$k][$key]) > 0) {
                                                    $nilai[$k][$key] = $rs[$k][$key]->skala_nilai;
                                                }
                                            }
                                        @endphp
                                        <button class="btn btn-block n" {{$active}}  data-id="{{$data->hashid}}" style="color:#fff;background: {{warnai($nilai[$k][$key])}}">{{$nilai[$k][$key]}}</button>
                                    </td>

                                    {{-- Melayani --}}
                                    <td class="text-center">
                                        @php
                                            $nilai[$k][$key] = 0;

                                            $r[$k][$key] = $data->r_assesment
                                                                ->where('tahun', $t)
                                                                ->where('triwulan', $tw)
                                                                ->where('daftarindikator_id', 3)
                                                                ->first();

                                            if (count($r[$k][$key]) > 0) {

                                                $rs[$k][$key] = $r[$k][$key]->s_assesment
                                                                ->where('iku', function($q)
                                                                {
                                                                    $q->where('namaprogram', 'pelaksanaan_program_budaya#' . $t. '#' . $tw . '#ojk_melayani');
                                                                })
                                                                ->first();

                                                if (count($rs[$k][$key]) > 0) {
                                                    $nilai[$k][$key] = $rs[$k][$key]->skala_nilai;
                                                }
                                            }
                                        @endphp
                                        <button class="btn btn-block n" {{$active}}  data-id="{{$data->hashid}}" style="color:#fff;background: {{warnai($nilai[$k][$key])}}">{{$nilai[$k][$key]}}</button>
                                    </td>

                                    {{-- Peduli --}}
                                    <td class="text-center">
                                        @php
                                            $nilai[$k][$key] = 0;

                                            $r[$k][$key] = $data->r_assesment
                                                                ->where('tahun', $t)
                                                                ->where('triwulan', $tw)
                                                                ->where('daftarindikator_id', 3)
                                                                ->first();

                                            if (count($r[$k][$key]) > 0) {

                                                $rs[$k][$key] = $r[$k][$key]->s_assesment
                                                                ->where('iku', function($q)
                                                                {
                                                                    $q->where('namaprogram', 'pelaksanaan_program_budaya#' . $t. '#' . $tw . '#ojk_peduli');
                                                                })
                                                                ->first();

                                                if (count($rs[$k][$key]) > 0) {
                                                    $nilai[$k][$key] = $rs[$k][$key]->skala_nilai;
                                                }
                                            }
                                        @endphp
                                        <button class="btn btn-block n" {{$active}}  data-id="{{$data->hashid}}" style="color:#fff;background: {{warnai($nilai[$k][$key])}}">{{$nilai[$k][$key]}}</button>
                                    </td>
                                @else
                                    <td class="text-center">
                                        @php
                                            $nilai[$k][$key] = $data->r_assesment
                                                                ->where('tahun', $t)
                                                                ->where('triwulan', $tw)
                                                                ->where('daftarindikator_id', $persen->daftar_indikator->id)
                                                                ->first();
                                            $nilai[$k][$key] = count($nilai[$k][$key]) == 0 ? 0 : $nilai[$k][$key]->nilai;
                                        @endphp
                                        <button class="btn btn-block n" {{$active}}  data-id="{{$data->hashid}}" style="color:#fff;background: {{warnai($nilai[$k][$key])}}">{{$nilai[$k][$key]}}</button>
                                    </td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @else

                <div class="alert alert-info">Belum ada Penentuan persentase indikator dari dari admin untuk triwulan {{$tw}} tahun {{$t}}</div>
            @endif
        </div>
    </div>

@endsection


@section('js')
    <script src="{{asset('vendor/js/pages/tablesDatatables.js')}}"></script>
    <script>$(function(){ TablesDatatables.init(); });</script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myTable').DataTable({
                sort:false
            });
        });
    </script>

    <script type="text/javascript">
        $(document).on('click', '.n', function() {
            var c = $(this).attr('data-id');
            var lr = '{{url('revisicp')}}/' + c + '?t={{Hashids::connection('tahun')->encode($t)}}&p={{Hashids::connection('triwulan')->encode($tw)}}';
            var ll = '{{url('lihathasilassesment')}}/' + c + '?t={{Hashids::connection('tahun')->encode($t)}}&p={{Hashids::connection('triwulan')->encode($tw)}}';

            $('#revisicp').prop('action', '').prop('action', lr);
            $('#lihat').prop('href', '').prop('href', ll);
            $('#menuModal').modal('show');
        });
    </script>
@endsection