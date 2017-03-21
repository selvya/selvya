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

@php
    $rep = \App\ReportAssessment::where('tahun', date('Y'))
            ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
            ->where('daftarindikator_id', 1)
            ->where('user_id', getSatker())
            ->first();
    if (count($rep) > 0) {
        $rep = \Carbon\Carbon::parse($rep->updated_at);
    }else{
        $rep = null;
    }
@endphp


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

                    <!-- Fourth Step -->
                    <div id="clickable-fourth" class="step">

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
                                    <li>
                                        <a href="{{url('edit-self-assessment/'.Request::segment(2).'/serapan-anggaran')}}" data-gotostep="clickable-second" class="stepnya"><strong>
                                            <i class="fa fa-check"></i>Serapan Anggaran <br> <big>{{$atasWizard}}% [{{$anggaran->nilai}}]%</big></strong>
                                        </a>
                                    </li>
                                    @endif
                                    @if($pimpinan != null)
                                    <li>
                                        <a href="{{url('edit-self-assessment/'.Request::segment(2).'/partisipasi-pimpinan')}}" data-gotostep="clickable-third">
                                            @php
                                                $nilaiPim = cekNilaiPimpinan(date('Y'), cekCurrentTriwulan()['current']->triwulan, getSatker());
                                            @endphp
                                            <strong>Partisipan Pimpinan <br> <big>{{$nilaiPim}}% [{{$pimpinan->nilai}}%]</big></strong>
                                        </a>
                                    </li>
                                    @endif
                                    @if($pelaporan != null)
                                    <li class="active">
                                        <a href="{{url('edit-self-assessment/'.Request::segment(2).'/kecepatan-pelaporan')}}" data-gotostep="clickable-fourth">
                                            <strong>Kecepatan Pelaporan <br> <big>{{ ( ((int) cekSimpanPelaporan($rep)) / 6) * cekPersenLaporan(date('Y'), 1, cekCurrentTriwulan()['current']->triwulan)->nilai}}% [{{$pelaporan->nilai}}%]</big></strong>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <br>
                        <div class="container" style="max-width: 1000px; overflow: hidden;">
                            <div class="block">
                                
                                Tanggal pelaporan: {{readify(cekCurrentTriwulan()['current']->tanggal)}}
                                <br>
                                Nilai Kecepatan Pelaoran: {{cekSimpanPelaporan($rep)}} ({{ ( ((int) cekSimpanPelaporan($rep)) / 6) * cekPersenLaporan(date('Y'), 1, cekCurrentTriwulan()['current']->triwulan)->nilai}}%)
                            </div>
                        </div>
                    </div>
                    <!-- END Fourth Step -->

                    <!-- Form Buttons -->
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-6">
                            {{csrf_field()}}
                            {{-- <input type="reset" class="btn btn-lg btn-warning" id="back2" value="Back"> --}}
                            @php
                                $thn = date('Y');
                                $tw = cekCurrentTriwulan()['current']->triwulan;
                                $usr = getSatker();
                            @endphp
                            
                            @if(
                                $rep == null OR
                                !cekBudaya($thn, $tw, $usr) OR
                                !cekFinalPimpinan($thn, $tw, $usr) OR
                                !cekFinalAnggaran($thn, $tw, $usr)
                            )
                                <input type="submit" class="btn btn-lg btn-primary" id="next2" value="Next">
                            @endif
                        </div>
                    </div>
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