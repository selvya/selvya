@extends('layout.master')
@section('content')
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
				<tr>
					<td><b>Deputi Komisioner</b></td>
					<td>:</td>
					<td>Manajemen Strategis IB</td>
				</tr>
				<tr>
					<td><b>Satuan Kerja</b></td>
					<td>:</td>
					<td>Perencanaan Strategis, Manajemen Perubahan dan Sekretariat Dewan Komisioner</td>
				</tr>
				<tr>
					<td><b>Direktorat/KOJK</b></td>
					<td>:</td>
					<td>N/A</td>
				</tr>
			</table>
		</div>
		<div class="text-right">
			<a href="{{url('arsip/assessment')}}" class="btn btn-lg btn-default" data-toggle="tooltip" title="Lihat Arsip Assessment"><i class="fa fa-book"></i> Arsip</a>
		</div>
		<br>
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
					$datenya = date('m');
					if (date('m') == '1' || date('m') == '2' || date('m') == '3') {
						$tri = '1';
					}
					elseif(date('m') == '4' || date('m') == '5' || date('m') == '6') {
						$tri = '2';
					}
					elseif(date('m') == '7' || date('m') == '8' || date('m') == '9') {
						$tri = '3';
					}
					elseif(date('m') == '10' || date('m') == '11' || date('m') == '12') {
						$tri = '4';
					}

					$report = \App\ReportAssessment::where('user_id','1')->where('tahun',date('Y'))->where('triwulan',$tri)->orderBy('created_at','DESC')->get();

					?>
					@forelse($report as $data)
					<?php
					if($data->triwulan == '1') {
						$triwulan = 'Januari - Maret';
					}
					elseif($data->triwulan == '2'){
						$triwulan = 'April - Juni';
					}
					elseif($data->triwulan == '3'){
						$triwulan = 'Juli - September';
					}
					elseif($data->triwulan == '4'){
						$triwulan = 'Oktober - Desember';
					}
					?>
					<tr class="odd">
						<td class="text-center">{{$triwulan}}</td>
						<td class="text-center">{{$data->tahun}}</td>
						<td >
							<div>

								<p>
									<strong>Terakhir diubah :</strong> 20-12-2019
									<span class="text-muted pull-right">20% Complete</span>
								</p>
								<div class="progress progress-striped active">
									<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
										<span class="sr-only">20% Complete</span>
									</div>
								</div>

								<strong>Final pada :</strong> 20-12-2019
								<span class="text-muted pull-right">100% Complete</span>
								<div class="progress progress-striped">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
										<span class="sr-only">100% Complete</span>
									</div>
								</div>

							</div>
						</td>
						<td class="text-center">
							<br>
							<a href="{{url('edit-self-assessment')}}" class="btn btn-warning">Ubah 
							</a>
							<a href="{{url('detail/assessment')}}" class="btn btn-primary">Preview </a>
							@if($data->final_status == 1)
							<span class="btn btn-success"> Sudah di Final</span>
							@endif
						</td>
					</tr>
					@empty
					@endforelse
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
	@endsection