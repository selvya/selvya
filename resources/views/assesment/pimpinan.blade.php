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
                <form id="clickable-wizard" action="page_forms_wizard.html" method="post" class="form-horizontal form-bordered">

                    <!-- Third Step -->
                    <div id="clickable-third" class="step">

                    @include('include.alert')

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
                                            <i class="fa fa-check"></i>Serapan Anggaran <br> <big>{{$anggaran->nilai}}%</big></strong>
                                        </a>
                                    </li>
                                    @endif
                                    @if($pimpinan != null)
                                    <li class="active">
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
                                <div class="block-content">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Nama Program <span class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Peran Pimpinan <span class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Partisipasi Pimpinan <span class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" min="0" max="10">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Lampiran Pendukung <span class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Third Step -->

                    <!-- Form Buttons -->
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-6">
                            <input type="reset" class="btn btn-lg btn-warning" id="back2" value="Back">
                            <input type="submit" class="btn btn-lg btn-primary" id="next2" value="Next">
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