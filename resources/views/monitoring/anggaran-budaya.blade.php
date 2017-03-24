@extends('layout.master')
@section('content')


<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header content-media">
		<div class="header-section">
			<div class="jumbotron" >
				<div class="col-md-12">
					<h1 >Salam <b>Perubahan</b></h1>
					<h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Anggaran Program Budaya</h4>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Anggaran Program Budaya</li>
	</ul>
	<!-- END Datatables Header -->

	<?php
	$triwulan = cekCurrentTriwulan();
	$all= \App\ReportAssessment::where('daftarindikator_id','2')
	->where('tahun',date('Y'))
	->where('triwulan',$triwulan['current']['triwulan'])
	->join('users','report_assesment.user_id','=','users.id')
	->get();

	$final = \App\ReportAssessment::where('daftarindikator_id','2')
	->where('tahun',date('Y'))
	->where('triwulan',$triwulan['current']['triwulan'])
	->where('final_status','1')
	->join('users','report_assesment.user_id','=','users.id')
	->get();

	$belumfinal = \App\ReportAssessment::where('daftarindikator_id','2')
	->where('tahun',date('Y'))
	->where('triwulan',$triwulan['current']['triwulan'])
	->where('final_status','0')
	->join('users','report_assesment.user_id','=','users.id')
	->get();
	?>

	<!-- Datatables Content -->
	<div class="block full">
		<div class="container">
			<b>Rekapitulasi:</b> <br>
			<span class="btn btn-success"><b>Sudah Final</b><br><big>{{count($final)}}</big></span>
			<span class="btn btn-danger"><b>Belum Final</b><br><big>{{count($belumfinal)}}</big></span>
		</div>
		<br>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="myTable">
				<thead>
					<tr>
						<th>Deputi Komisioner</th>
						<th>Departemen</th>
						<th style="width:13%;">KOJK</th>
						<th style="width:13%;text-align:center">Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach($all as $data)
					<tr>
						<td>{{$data->deputi_kom}}</td>
						<td>{{$data->departemen}}</td>
						<td>{{$data->kojk}}</td>
						<td style="text-align:center">
							@if($data->final_status == 1)
							<label class="btn btn-success">Sudah Memiliki</label>
							@else
							<label class="btn btn-danger">Belum Memiliki</label>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
	</div>
	<!-- END Datatables Content -->
</div>
<!-- END Page Content -->
@endsection
@section('js')
<script src="{{asset('vendor/js/pages/tablesDatatables.js')}}"></script>
<script>
	$(function(){ TablesDatatables.init(); });
	$(document).ready(function(){
		$('#myTable').DataTable();
	});
</script>
@endsection