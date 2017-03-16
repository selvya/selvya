@extends('layout.master')
@section('content')
<style type="text/css">
	.dataTables_paginate{display: none!important;}
	.dataTables_info{display: none;}
</style>
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-sort"></i>
				<b>Lembar Assessment</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Lembar Assessment</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
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
					
					?>
					<tr class="odd">
						<td class="text-center">{{date('M', strtotime($triwulan['current']['sejak']))}} - {{date('M', strtotime($triwulan['current']['hingga']))}}</td>
						<td class="text-center">{{$report->tahun}}</td>
						<td >
							<div>
								@if(count($reportall) == 4)
								<strong>Final pada :</strong> {{date('d-M-Y', strtotime($reportall->last()->created_at))}}
								@else
								<strong>Terakhir diubah pada :</strong> {{date('d-M-Y', strtotime($reportall->last()->created_at))}}
								@endif

								<span class="text-muted pull-right">@if($reportall->last()->nilai == 0) 0% @elseif(count($reportall) == 1) 25% @elseif(count($reportall) == 2) 50% @elseif(count($reportall) == 3) 75% @else 100% @endif Complete</span>
								<div class="progress progress-striped">
									<div class="progress-bar @if(count($reportall) <= 3) progress-bar-danger @else progress-bar-success  @endif" role="progressbar" aria-valuenow="@if(count($reportall) == 1) 25 @elseif(count($reportall) == 2) 50 @elseif(count($reportall) == 3) 75 @else 100 @endif" aria-valuemin="0" aria-valuemax="100" style="width:@if(count($reportall) == 0) 1% @elseif(count($reportall) == 1) 25% @elseif(count($reportall) == 2) 50% @elseif(count($reportall) == 3) 75% @else 100% @endif;">
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
								

							</div>
						</td>
						<td class="text-center">
							<br>
							<a href="{{url('edit-self-assessment/'.$report->hashid.'/programbudaya')}}" class="btn btn-warning">
								Ubah 
							</a>							
							@if((count($reportall) == 4)  && ($report->last()->final_status == 1))
							<a href="{{url('detail/assessment')}}" class="btn btn-primary">Preview </a>
							<span class="btn btn-success"> Sudah di Final</span>
							@endif
						</td>
					</tr>
				</tbody>
			</table>
			<div class="col-md-12 text-center">
				
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
	@endsection