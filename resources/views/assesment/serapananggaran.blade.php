@extends('layout.master')
@section('css')

@endsection
@section('content')
<style type="text/css">
    .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td, .table tbody + tbody, .table-bordered, .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td{
        border:none;
    }
    .form-bordered .form-group{
        padding: 10px 15px!important;
    }
</style>
<div id="page-content">
    <!-- Wizard Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-magic"></i>
                Edit Self Assessment
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{url('/')}}">Beranda</a></li>
        <li><a href="{{url('lembar-self-assessment')}}">Self Assessment</a></li>
        <li>Edit Self Assessment</li>
    </ul>
    <!-- END Wizard Header -->
    
    <!-- Wizards Row -->
    <div class="row">
        <div class="col-md-12">
            <!-- Wizard with Validation Block -->
            <div class="block">
                <!-- Wizard with Validation Title -->
                <div class="block-title">
                    <h2><strong>Form</strong></h2>
                </div>
                <!-- END Wizard with Validation Title -->

                <!-- Wizard with Validation Content -->
                <form id="clickable-wizard" action="" method="post" class="form-horizontal form-bordered">

                @include('include.alert')
                    <!-- Second Step -->
                    <div id="clickable-second" class="step" style="overflow: hidden;">

                        <div class="form-group">
                            <div class="col-xs-12">
                                <ul class="nav nav-pills nav-justified clickable-steps">
                                    @if(($inovatif != null ) || ($melayani != null) || ($peduli != null))
                                    <li>
                                        <a href="{{url('edit-self-assessment/'.Request::segment(2).'/programbudaya')}}" data-gotostep="clickable-first">
                                            <strong><i class="fa fa-check"></i>Pelaksanaan Program Budaya <br> <big>{{$persen->nilai}}%</big></strong>
                                        </a>
                                    </li>
                                    @endif
                                    @if($anggaran != null)
                                    <li class="active">
                                        <a href="{{url('edit-self-assessment/'.Request::segment(2).'/serapan-anggaran')}}" data-gotostep="clickable-second" class="stepnya"><strong>
                                            Serapan Anggaran <br> <big>{{$atasWizard}}% / {{$anggaran->nilai}}%</big></strong>
                                        </a>
                                    </li>
                                    @endif
                                    @if($pimpinan != null)
                                    <li>
                                        <a href="{{url('edit-self-assessment/'.Request::segment(2).'/partisipasi-pimpinan')}}" data-gotostep="clickable-third">
                                            <strong>Partisipan Pimpinan <br> <big>{{$pimpinan->nilai}}%</big></strong>
                                        </a>
                                    </li>
                                    @endif
                                    @if($pelaporan != null)
                                    <li>
                                        <a href="{{url('edit-self-assessment/'.Request::segment(2).'/kecepatan-pelaporan')}}" data-gotostep="clickable-fourth">
                                            <strong>Kecepatan Pelaporan <br> <big>{{$pelaporan->nilai}}%</big></strong>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <br>
                        <div class="container" style="max-width: 1000px; overflow: hidden;">
                            <div class="block">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                @if(Session::has('msg'))
                                                    {!!Session('msg')!!}
                                                @endif
                                                <form method="post" class="form-horizontal" enctype="multipart/form-data" action="">
                                                    <div class="form-group">
                                                        <label for="disabledSelect" class="control-label col-md-2">Total Anggaran</label> <span class="pull-right">{{hitungNilaiSerapan(date('Y'), cekCurrentTriwulan()['current']->triwulan, Auth::user()->id)}}/6</span>
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">Rp</span>
                                                                <input
                                                                    class="form-control readonly"
                                                                    type="text"
                                                                    name="total_anggaran"
                                                                    min="1"
                                                                    step="1"
                                                                    value="{{number_format($anggaranN->total_anggaran, 0, ',', '.')}}"
                                                                    @if($anggaranN->status == 1) disabled readonly @endif 
                                                                >
                                                                @if($anggaranN->status == 0)
                                                                    <span class="input-group-btn">
                                                                        <button type="button" class="btn btn-success" id="finalisasi_total">Finalisasi</button>
                                                                    </span>
                                                                @endif
                                                            </div>  
                                                        </div>                              
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <table class="table table-striped table-bordered">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>&nbsp;</td>
                                                                            <td>Triwulan I</td>
                                                                            <td>Triwulan II</td>
                                                                            <td>Triwulan III</td>
                                                                            <td>Triwulan IV</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Rencana Anggaran</td>
                                                                            @foreach($rencanaN as $k => $v)
                                                                            <td>
                                                                                <div class="input-group">
                                                                                    <span class="input-group-addon">Rp.</span>
                                                                                    <input name="rencana_{{($k+1)}}" id="rencana_{{($k+1)}}" type="text" class="form-control rencana" value="{{number_format($v->rencana, 0, ',', '.')}}" @if($v->rencana > 0) readonly @endif required >
                                                                                </div>
                                                                            </td>
                                                                            @endforeach
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Realisasi Anggaran</td>
                                                                            {{-- {{dd($rencanaN)}} --}}
                                                                            @foreach($rencanaN as $k => $v)
                                                                            <td>
                                                                                <div class="input-group">
                                                                                    <span class="input-group-addon">Rp.</span>
                                                                                    <input 
                                                                                        type="text"
                                                                                        name="realisasi_{{$k+1}}"
                                                                                        class="form-control realisasi"
                                                                                        value="{{number_format($v->realisasi, 0, ',', '.')}}"
                                                                                        @php

                                                                                        // $no = \Carbon\Carbon::parse('2017-11-10 00:00:00');
                                                                                        $twww[$k] = \App\TanggalLaporan::where('tahun', date('Y'))
                                                                                                        ->where('triwulan', ($k+1))
                                                                                                        ->first();
                                                                                        $awal[$k] = \Carbon\Carbon::parse($twww[$k]->sejak);
                                                                                        $akhir[$k] = \Carbon\Carbon::parse($twww[$k]->hingga);
                                                                                        $now[$k] = \Carbon\Carbon::now();
                                                                                        // $now[$k] = $no;
                                                                                        @endphp

                                                                                    @if($v->rencana == 0 OR !$now[$k]->between($awal[$k], $akhir[$k]))
                                                                                        readonly 
                                                                                    @endif
                                                                                    >
                                                                                </div>
                                                                            </td>
                                                                            @endforeach
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="exampleInputFile">Lampiran<br>(Max. 20MB)<br>(.zip,.rar, .pdf, .jpg)</label>
                                                                            </td>
                                                                            @foreach($rencanaN as $k => $v)
                                                                            @if($v->file == null)
                                                                            <td>
                                                                                <input 
                                                                                class="form-control" 
                                                                                type="file"
                                                                                name="lampiran_{{$k+1}}"
                                                                                @if($v->rencana == 0 OR !$now[$k]->between($awal[$k], $akhir[$k]))
                                                                                disabled 
                                                                                @endif
                                                                                >
                                                                            </td>
                                                                            @else
                                                                            <td>
                                                                                <a href="{{url('attachment/lampiran_anggaran/' . $v->file . '?dl=1')}}">{{str_limit($v->file, 20)}}</a>
                                                                            </td>
                                                                            @endif
                                                                            @endforeach
                                                                            {{-- <td>
                                                                            <input class="form-control" type="file" id="exampleInputFile1" name="userfile1" onchange="AlertFilesize(document.getElementById('exampleInputFile1').getAttribute('id'),1)">
                                                                        </td>
                                                                        <td>Belum ada Lampiran</td>
                                                                        <td>Belum ada Lampiran</td>
                                                                        <td>Belum ada Lampiran</td> --}}
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <a href="{{url('monitoring-anggaran')}}" class="btn btn-default"><i class="fa fa-arrow-circle-o-left"></i>&nbsp;Kembali</a> --}}
                                                {{csrf_field()}}
                                                {{-- <button type="submit" id="done" class="btn btn-success"><i class="fa fa-floppy-o"></i>&nbsp;Submit</button> --}}
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- </div>
                        </div>
                    </div> --}}
                    <!-- END Second Step -->

                    <!-- Form Buttons -->
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-6">
                            {{-- <input type="reset" class="btn btn-lg btn-warning" id="back2" value="Back"> --}}
                            <input type="submit" class="btn btn-lg btn-primary" id="next2" value="Next">
                        </div>
                    </div>
                     </form>
                    <!-- END Form Buttons -->
                </form>
                <!-- END Wizard with Validation Content -->
            </div>
            <!-- END Wizard with Validation Block -->
        </div>
    </div>
    <!-- END Wizards Row -->    
</div>
@endsection
@section('js')
<script src="{{asset('vendor/js/pages/formsWizard.js')}}"></script>
<script>$(function(){ FormsWizard.init(); });</script>
@endsection