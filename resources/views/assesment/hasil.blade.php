@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-sort"></i>
                <b>Hasil Assessment</b>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{url('/')}}">Beranda</a></li>
        <li>Hasil Assessment</li>
    </ul>
    <!-- END Datatables Header -->
    <?php 
    $triwulan = cekCurrentTriwulan();

    $user = \App\User::with(['r_assesment' => function($q) use ($triwulan){
            $q->where('tahun',date('Y'))
            ->where('triwulan',$triwulan['current']['triwulan'])
            ->where('final_status','1');
        }])
        ->where('username','LIKE','kmp%')
        ->get();

    $persentase = \App\Persentase::with('daftar_indikator')
                    ->where('tahun',date('Y'))
                    ->where('triwulan',$triwulan['current']['triwulan'])
                    ->get();

    $periode = \App\TanggalLaporan::where('tahun',date('Y'))->where('triwulan',$triwulan['current']['triwulan'])->first();
    ?>
    <!-- Datatables Content -->
    <div class="block full">
        <h6><b>Nilai Rata-Rata per Program:</b></h6>
        <a href="" class="btn btn-warning"><b>OJK Melayani</b><br><big>10</big></a>
        <a href="" class="btn btn-warning"><b>OJK Peduli</b><br><big>10</big></a>
        <a href="" class="btn btn-warning"><b>Program Budaya Spesifik</b><br><big>10</big></a>
        <a href="" class="btn btn-warning"><b>Peran Pimpinan</b><br><big>10</big></a>
        <a href="" class="btn btn-primary"><b>Total</b><br><big>10</big></a>
        <br><br>
        <table class="table table-striped table-bordered table-hover" id="myTable">
            <thead>
                <tr>
                    <td rowspan="2"><b>Username</b></td>
                    {{-- <td>Dep-Kom</td> --}}
                    {{-- <td>Satker</td> --}}
                    {{-- <td>Direktorat</td> --}}
                    <td rowspan="2"><b>Nilai</b></td>
                    @foreach($persentase as $v)
                        <td class="text-center" @if($v->daftar_indikator->id == 3) colspan="3" @else rowspan="2" @endif>
                            <h5>
                                <b>
                                    {{$v->daftar_indikator->name}}
                                    <br><br>
                                    {{$v->nilai}}
                                </b>
                            </h5>
                        </td>
                    @endforeach
                </tr>
                <tr>
                @foreach($persentase as $v)                
                        @if($v->daftar_indikator->id == 3)
                            <td><b>OJK Inovatif</b></td>
                            <td><b>OJK Melayani</b></td>
                            <td><b>OJK Peduli</b></td>
                        @endif
                @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($user as $k => $data)
                    <tr>
                        <td>{{$data->username}}</td>
                        {{-- <td class="text-center">{{$data->deputi_kom}}</td> --}}
                        {{-- <td class="text-center">{{$data->satker}}</td> --}}
                        {{-- <td class="text-center">{{$data->direktorat_id}}</td> --}}
                        @php
                            $n[$k]              = 0;
                            $n_melayani[$k]     = 0;
                            $n_peduli[$k]       = 0;
                            $n_inovatif[$k]     = 0;
                            $n_pimpinan[$k]     = 0;
                            $n_lomba[$k]        = 0;
                            $n_pelaporan[$k]    = 0;
                            $n_serapan[$k]      = 0;
                            $n_internal[$k]     = 0;
                            $n_eksternal[$k]    = 0;

                            foreach ($data->r_assesment as $key => $value) {
                                $n[$k] += $value->nilai;

                                if ($value->daftarindikator_id == 1) {
                                    $n_pelaporan[$k] += $value->nilai;
                                }
                                if ($value->daftarindikator_id == 2) {
                                    $n_serapan[$k] += $value->nilai;
                                }

                                if ($value->daftarindikator_id == 3) {
                                    $n_melayani[$k] += $value->hasil_melayani;
                                    $n_peduli[$k]   += $value->hasil_peduli;
                                    $n_inovatif[$k] += $value->hasil_inovatif;
                                }

                                if ($value->daftarindikator_id == 4) {
                                    $n_pimpinan[$k] += $value->nilai;
                                }
                                if ($value->daftarindikator_id == 5) {
                                    $n_lomba[$k] += $value->nilai;   
                                }
                                if ($value->daftarindikator_id == 6) {
                                    $n_internal[$k] += $value->nilai;   
                                }
                                if ($value->daftarindikator_id == 7) {
                                    $n_eksternal[$k] += $value->nilai;   
                                }
                            }
                        @endphp
                        <td class="text-center">{{$n[$k]}}</td>
                        <td class="text-center">{{$n_pelaporan[$k]}}</td>
                        <td class="text-center">{{$n_serapan[$k]}}</td>
                        <td class="text-center">{{$n_melayani[$k]}}</td>
                        <td class="text-center">{{$n_peduli[$k]}}</td>
                        <td class="text-center">{{$n_inovatif[$k]}}</td>
                        <td class="text-center">{{$n_pimpinan[$k]}}</td>
                        <td class="text-center">{{$n_lomba[$k]}}</td>
                        <td class="text-center">{{$n_internal[$k]}}</td>
                        <td class="text-center">{{$n_eksternal[$k]}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- END Datatables Content -->
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