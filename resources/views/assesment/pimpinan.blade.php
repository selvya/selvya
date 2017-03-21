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
    .red{background: #e74c3c;}
    .red > a{color: #fff;}
    .red > a:hover{background: #e74c3c!important;}
    .hijau{background: #1abc9c!important;}
    .hijau >a{color: #fff;}
    .hijau >a:hover{background: #1abc9c!important;}
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
                {{-- <form id="clickable-wizard" action="page_forms_wizard.html" method="post" class="form-horizontal form-bordered"> --}}

                <!-- Third Step -->
                <div id="clickable-third" class="step">

                    @include('include.alert')
                    @php
                    $triwulan = cekCurrentTriwulan();
                    $reportall = \App\ReportAssessment::where('triwulan',$triwulan['current']['triwulan'])
                    ->where('tahun',date('Y'))
                    ->where('user_id',Auth::user()->id)
                    ->where('daftarindikator_id','3')
                    ->first();
                    @endphp
                    <div class="form-group">
                        <div class="col-xs-12">
                            <ul class="nav nav-pills nav-justified clickable-steps">
                                @if(($inovatif != null ) || ($melayani != null) || ($peduli != null))
                                <li class="@if(!cekBudaya(date('Y'), $triwulan['current']['triwulan'], Auth::user()->id)) red @else hijau @endif">
                                    <a href="{{url('edit-self-assessment/'.$reportall->last()->hashid.'/programbudaya')}}" data-gotostep="clickable-first">
                                        <strong><i class="fa fa-check"></i>Pelaksanaan Program Budaya <br> 
                                        <big>{{$reportall->last()->hasil}}%</big> <big>[{{$persen->nilai}}%]</big>
                                    </a>
                                </li>
                                @endif
                                @if($anggaran != null)
                                <li class="@if($atasWizard == 0) red @else hijau @endif">
                                    @php

                                    $agg = \App\AnggaranTahun::where('tahun', date('Y'))
                                    ->where('user_id', getSatker())
                                    ->first()
                                    ->anggaran_triwulan
                                    ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                                    ->first();
                                    if ($agg->is_final != 0) {
                                    $atasWizard = (hitungNilaiSerapan(date('Y'), cekCurrentTriwulan()['current']->triwulan, Auth::user()->id) / 6) * cekPersenSerapan(date('Y'), 2, cekCurrentTriwulan()['current']->triwulan)->nilai;
                                }else{
                                $atasWizard = 0;
                            }

                            $pim = cekFinalPimpinan(date('Y'), cekCurrentTriwulan()['current']->triwulan, getSatker());

                            @endphp
                            <a href="{{url('edit-self-assessment/'.Request::segment(2).'/serapan-anggaran')}}" data-gotostep="clickable-second" class="stepnya"><strong>
                                <i class="fa fa-check"></i>Serapan Anggaran <br> <big>{{$atasWizard}}% [{{$anggaran->nilai}}%]</big></strong>
                            </a>
                        </li>
                        @endif
                        @if($pimpinan != null)
                        <li class="@if($nilaiPim == 0) red @else hijau @endif">
                            <a href="{{url('edit-self-assessment/'.Request::segment(2).'/partisipasi-pimpinan')}}" data-gotostep="clickable-third">
                                @php
                                $nilaiPim = cekNilaiPimpinan(date('Y'), cekCurrentTriwulan()['current']->triwulan, getSatker());
                                @endphp
                                <strong>Partisipan Pimpinan <br> <big>{{$nilaiPim}}% [{{$pimpinan->nilai}}%]</big></strong>
                            </a>
                        </li>
                        @endif
                        @if($pelaporan != null)
                        <li class="@if(( ((int) cekSimpanPelaporan($rep)) / 6) * cekPersenLaporan(date('Y'), 1, cekCurrentTriwulan()['current']->triwulan)->nilai == 0) red @else hijau @endif">
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
                    @php
                    $persen = \App\Persentase::where('tahun', date('Y'))
                    ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                    ->where('daftarindikator_id', 4)
                    ->first();

                    $iku = \App\Iku::with('alat_ukur.definisi')
                    ->where(
                    'namaprogram',
                    'partisipasi_pimpinan#' .
                    date('Y') . '#' .
                    cekCurrentTriwulan()['current']->triwulan
                    )->first();
                    // dd($iku);
                    @endphp

                    @if(!$pim)
                    <form class="form-horizontal" method="POST" action="">

                        @if($iku->tipe == 'parameterized')
                        <div class="form-group">
                            <label class="control-label col-lg-3">Nilai</label>
                            <div class="col-md-6">
                                <select name="nilai" class="form-control" required> 
                                    @foreach($iku->alat_ukur->first()->definisi as $k => $v)
                                    <option value="{{$k+1}}">{{$k+1}} - {{$v->deskripsi}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @else
                        <div class="form-group">
                            <label class="control-label col-lg-3">Nilai</label>
                            <div class="col-md-6">
                                <input type="text" name="nilai" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Partisipasi Pimpinan</label>
                            <div class="col-md-6">
                                <textarea name="partisipasi" class="form-control"></textarea>
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <div class="col-md-3">
                                {{csrf_field()}}
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary pull-right">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>

                    @else
                    <div class="jumbotron">
                        @php
                        $ppp = \App\ReportAssessment::where('tahun', date('Y'))
                        ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                        ->where('daftarindikator_id', 4)
                        ->where('user_id', getSatker())
                        ->first();
                        @endphp

                        <h4>Nilai: {{$ppp->nilai}} ({{cekNilaiPimpinan(date('Y'), cekCurrentTriwulan()['current']->triwulan, getSatker())}}%)</h4>
                        <p>{{$ppp->keterangan}}</p>
                    </div>
                    @endif            
                </div>
            </div>
        </div>
        <!-- END Third Step -->
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