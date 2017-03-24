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

    /*.redd{background: #e74c3c;}*/
    .redd > a{color: #e74c3c;}
    /*.redd > a:hover{background: #e74c3c!important;}*/
    /*.hijauu{background: #1abc9c!important;}*/
    .hijauu >a{color: #1abc9c!important;}
    /*.hijauu >a:hover{background: #1abc9c!important;}*/
</style>

@php
$triwulan = cekCurrentTriwulan();
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

$reportall = \App\ReportAssessment::where('triwulan',$triwulan['current']['triwulan'])
->where('tahun',date('Y'))
->where('user_id',Auth::user()->id)
->where('daftarindikator_id','3')
->get();
@endphp


<div id="page-content">
    <!-- Wizard Header -->
     <div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1 >Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Edit Self Assessment</h4>
                </div>
            </div>
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
                                    @php
                                        $belumFinal = false;
                                        $bbbb = \App\ReportAssessment::where('tahun', date('Y'))
                                                  ->where('triwulan',cekCurrentTriwulan()['current']->triwulan)
                                                  ->where('user_id', getSatker())
                                                  ->where('daftarindikator_id','3')
                                                  ->first();

                                        if (count($bbbb) > 0) {
                                            $belumFinal = true;
                                            $hasilinovatif = $bbbb->hasil_inovatif;
                                            $hasilmelayani =  $bbbb->hasil_melayani;
                                            $hasilpeduli =  $bbbb->hasil_peduli;
                                        }
                                    @endphp
                                    
                                    @if(($inovatif != null ) || ($melayani != null) || ($peduli != null))
                                    <li class="@if(($hasilinovatif == '') || ($hasilmelayani  == '') || ($hasilpeduli  == '')) redd @else hijauu @endif">
                                        <a href="{{url('edit-self-assessment/'.$reportall->last()->hashid.'/programbudaya')}}" data-gotostep="clickable-first">
                                            <strong>Pelaksanaan Program Budaya <br> 
                                                <big>{{$reportall->last()->hasil}}%</big> <big>[{{$persen->nilai}}%]</big>
                                            </strong>
                                        </a>
                                    </li>
                                    @endif
                                    @if($anggaran != null)
                                    <li class="@if($atasWizard == 0) redd @else hijauu @endif">
                                        <a href="{{url('edit-self-assessment/'.Request::segment(2).'/serapan-anggaran')}}" data-gotostep="clickable-second" class="stepnya"><strong> Serapan Anggaran <br> <big>{{$atasWizard}}% [{{$anggaran->nilai}}]%</big></strong>
                                        </a>
                                    </li>
                                    @endif
                                    
                                    @if($pimpinan != null)
                                            @php
                                                $nilaiPim = cekNilaiPimpinan(date('Y'), cekCurrentTriwulan()['current']->triwulan, getSatker());
                                                $pimF = false;
                                                $pimpinanFFF = \App\ReportAssessment::where('tahun', date('Y'))
                                                      ->where('triwulan', cekCurrentTriwulan()['current']->triwulan)
                                                      ->where('user_id', getSatker())
                                                      ->where('daftarindikator_id','4')
                                                  ->where('nilai','>','0')
                                                      ->first();
                                                if (count($pimpinanFFF)) {
                                                    $pimF = true;
                                                }
                                            @endphp

                                            <li class="@if(!$pimF) redd @else hijauu @endif">
                                                <a href="{{url('edit-self-assessment/'.Request::segment(2).'/partisipasi-pimpinan')}}" data-gotostep="clickable-third">                                    
                                                    <strong>Partisipan Pimpinan <br> <big>{{$nilaiPim}}% [{{$pimpinan->nilai}}%]</big></strong>
                                                </a>
                                            </li>
                                        @endif
                                    @if($pelaporan != null)
                                    <li class="@if(( ((int) cekSimpanPelaporan($rep)) / 6) * cekPersenLaporan(date('Y'), 1, cekCurrentTriwulan()['current']->triwulan)->nilai == 0) red @else hijau @endif">
                                        <a href="{{url('edit-self-assessment/'.Request::segment(2).'/kecepatan-pelaporan')}}" data-gotostep="clickable-fourth">
                                            <strong>Kecepatan Pelaporan <br> <big>{{ ( ((int) cekSimpanPelaporan($rep)) / 6) * cekPersenLaporan(date('Y'), 1, cekCurrentTriwulan()['current']->triwulan)->nilai}}% [{{$pelaporan->nilai}}%]</big></strong>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <br>
                        <div class="container" style="max-width:100%; overflow: hidden;">
                            <div class="block">

                                <h4 class="text-center">Tanggal pelaporan Seharusnya: {{readify(cekCurrentTriwulan()['current']->tanggal)}}</h4>
                                <br>
                                <h4 class="text-center">Nilai Kecepatan Pelaporan: {{cekSimpanPelaporan($rep)}} ({{ ( ((int) cekSimpanPelaporan($rep)) / 6) * cekPersenLaporan(date('Y'), 1, cekCurrentTriwulan()['current']->triwulan)->nilai}}%)</h4>
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
                            {{-- @if($rep == null) --}}
                                <input type="submit" class="btn btn-lg btn-primary" id="next2" value="Finalisasi Lembar Self Assessment">
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

<script type="text/javascript">
    $('#next2').on('click', function(e) {
        e.preventDefault();
        if (confirm('Apakah anda yakin? ini akan mengirimkan semua data triwulan ini dan tidak dapat diubah kembali')) {
            // alert('asdas');
            $('#clickable-wizard').submit();
        }
    });  <?php 
									   if (count($bbbb) > 0) {
                                            if($bbbb->final_status){ ?>
												$(".form-bordered :input").attr("disabled", true);
												$('.form-bordered [type=submit],.form-bordered [type=file]').hide();
												$('.table a').hide();
												$('.table a.btn.btn-danger.btn-block').show();
											<?php  }
                                        }
										?>
</script>
@endsection