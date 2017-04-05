@extends('layout.master')
@section('content')
<style type="text/css">
    .dataTables_paginate{display: none!important;}
    .dataTables_info{display: none;}
</style>
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1>Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Lembar Assessment</h4>
                </div>
            </div>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{url('/')}}">Beranda</a></li>
        <li>Lembar Assessment</li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->
    <div class="block full">
        @if (count($jumlahPersen) > 0)

        <div class="table-responsive">
            <table>
                @php
                    $satkerObj = \App\User::findOrFail(getSatker());
                @endphp
                <tr>
                    <td>Deputi Komisioner</td>
                    <td>:</td>
                    <td>{{$satkerObj->nm_deputi_komisioner}}</td>
                </tr>
                <tr>
                    <td>Satuan Kerja</td>
                    <td>:</td>
                    <td>{{$satkerObj->nm_bidang}}</td>
                </tr>
                <tr>
                    <td>Direktorat/KOJK</td>
                    <td>:</td>
                    <td>{{$satkerObj->nm_unit_kerja}}</td>
                </tr>
            </table>
        </div>
        <div class="text-right">
            <a href="{{url('arsip/assessment')}}" class="btn btn-lg btn-default" data-toggle="tooltip" title="Lihat Arsip Assessment"><i class="fa fa-book"></i> Arsip</a>
        </div>
        <br>
        @include('include.alert')
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="myTable" aria-describedby="dataTables-example_info">
                <thead>
                    <tr role="row">
                        <th>Bulan/Periode</th>
                        <th>Tahun</th>
                        <th>Progress</th>
                        <th>Pengaturan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 

                    // $triwulan = cekCurrentTriwulan();
                    // $report = \App\ReportAssessment::where('user_id','1')->where('tahun',date('Y'))->where('triwulan',$triwulan['current']['triwulan'])->paginate(10);
                    $months = array('January' => 'Januari', 'February'=>'Februari', 'March'=>'Maret', 'April'=>'April', 'May'=>'Mei', 'June'=>'Juni', 'July'=>'Juli', 'August'=>'Agustus', 'September'=>'September', 'October'=>'Oktober', 'November'=>'November', 'December'=>'Desember');
                    ?>
                    <tr class="odd">
                        <td class="text-center">{{str_replace(array_keys($months), array_values($months), date('F', strtotime($triwulan['current']['sejak'])))}} - {{str_replace(array_keys($months), array_values($months), date('F', strtotime($triwulan['current']['hingga'])))}}</td>
                        <td class="text-center">{{$report->tahun}}</td>
                        <td >
                            <div>
                                @php
                                    

                                    $peritem = 100 / count($jumlahPersen);
                                    $n = 0;
                                    foreach ($jumlahPersen as $key => $value) {
                                        $tmp = \App\ReportAssessment::where('tahun', date('Y'))
                                                ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                                                ->where('daftarindikator_id', $value->daftarindikator_id)
                                                // ->where('final_status', 1)
                                                ->where('user_id', getSatker())
                                                ->first();

                                        if (count($tmp) > 0) {
                                            if ($tmp->daftarindikator_id == 3) {
                                                if ($tmp->final_status == 1) {
                                                    $n += $peritem;
                                                }
                                            }else{
                                                $n += $peritem;
                                            }
                                            
                                        }

                                        // echo $value->daftarindikator_id;
                                    }

                                @endphp
                                {{-- <kbd class="pull-left">{{$n}}%</kbd>---------------<kbd class="pull-right">100%</kbd> --}}
                                <div class="progress"style="background-color:#ccc;">
								@if(empty($nilaifinal) || $nilaifinal->nilai == 0)
                                    <div class="progress-bar @if($n < 100) progress-bar-danger @endif progress-bar-striped" role="progressbar" aria-valuenow="{{$n}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$n}}%;min-width: 2em;">
                                        {{$n}}% Pencapaian
                                    </div>@else 
										<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{$nilaifinal->nilai}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$nilaifinal->nilai}}%;min-width: 2em;">
                                       Nilai Final : <b>{{$nilaifinal->nilai}}</b>
										</div>
										@endif
                                </div>
                                <span>
                                    @php
                                        $t = \App\ReportAssessment::where('user_id', getSatker())
                                            ->where('tahun', date('Y'))
                                            ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                                            ->orderBy('updated_at', 'DESC')
                                            ->first();
                                        // dd($t);
                                        setlocale(LC_TIME, 'id');
                                        $lu = \Carbon\Carbon::parse($t->updated_at);
                                    @endphp
									@if(empty($nilaifinal) || $nilaifinal->nilai == 0)
                                    Pembaruan terakhir:
                                        <code>{{$lu->formatLocalized('%A %d %B %Y')}}  {{$lu->hour . ':' . $lu->minute}}</code>
										@else
                                    Finalisasi pada: 
                                   @php     $luz = \Carbon\Carbon::parse($nilaifinal->updated_at); @endphp
                                        <code style="color:green">{{$luz->formatLocalized('%A %d %B %Y')}}  {{$luz->hour . ':' . $luz->minute}}</code>
									@endif
                                </span>
                                {{-- @if(count($reportall) == 4)
                                <strong>Final pada :</strong> {{date('d-M-Y', strtotime($reportall->last()->created_at))}}
                                @else
                                <strong>Terakhir diubah pada :</strong> {{date('d-M-Y', strtotime($reportall->last()->created_at))}}
                                @endif

                                <span class="text-muted pull-right">@if($reportall->last()->hasil == 0) 0% @elseif(count($reportall) == 1) 25% @elseif(count($reportall) == 2) 50% @elseif(count($reportall) == 3) 75% @else 100% @endif Complete</span>
                                <div class="progress progress-striped">
                                    <div class="progress-bar @if(count($reportall) <= 3) progress-bar-danger @else progress-bar-success  @endif" role="progressbar" aria-valuenow="@if(count($reportall) == 1) 25 @elseif(count($reportall) == 2) 50 @elseif(count($reportall) == 3) 75 @else 100 @endif" aria-valuemin="0" aria-valuemax="100" style="width:@if(count($reportall) == 1) 1% @elseif(count($reportall) == 1) 25% @elseif(count($reportall) == 2) 50% @elseif(count($reportall) == 3) 75% @else 100% @endif;">
                                        <span class="sr-only">
                                            @if($report->nilai == 0) 0%
                                            @elseif(count($report) == 1) 25% 
                                            @elseif(count($report) == 2) 50% 
                                            @elseif(count($report) == 3) 75% 
                                            @else 100% 
                                            @endif 

                                            Complete
                                        </span>
                                    </div>
                                </div>
								--}}
                            </div>
                        </td>
                        <td class="text-center">
								@if(empty($nilaifinal) || $nilaifinal->nilai == 0)
                            <a href="{{url('edit-self-assessment/'.$report->hashid.'/programbudaya')}}" class="btn btn-warning"> <i class="fa fa-edit"></i> 
                                Ubah 
                            </a>                            @else
                            <a href="{{url('edit-self-assessment/'.$report->hashid.'/programbudaya')}}" class="btn btn-primary"> <i class="fa fa-search"></i> Preview </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="col-md-12 text-center">
                
            </div>
                    @else
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning">
                        Maaf Admin belum selesai mengatur aplikasi.
                    </div>
                </div>
            </div>
        @endif
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