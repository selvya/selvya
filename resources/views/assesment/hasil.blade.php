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

	$user = \App\ReportAssessment::where('tahun',date('Y'))
	->where('triwulan',$triwulan['current']['triwulan'])
	->where('final_status','1')
	->join('users','report_assesment.user_id','=','users.id')
	->groupBy('user_id')
	->get();

	$periode = \App\TanggalLaporan::where('tahun',date('Y'))->where('triwulan',$triwulan['current']['triwulan'])->first();
	?>
	<!-- Datatables Content -->
	<div class="block full">
		<a href="" class="btn btn-warning"><b>OJK Melayani</b><br><big>10</big></a>
		<a href="" class="btn btn-warning"><b>OJK Peduli</b><br><big>10</big></a>
		<a href="" class="btn btn-warning"><b>Program Budaya Spesifik</b><br><big>10</big></a>
		<a href="" class="btn btn-warning"><b>Peran Pimpinan</b><br><big>10</big></a>
		<a href="" class="btn btn-primary"><b>Total</b><br><big>10</big></a>
		<br><br>
		<table class="table table-striped table-bordered table-hover" id="myTable">
			<thead>
				<tr>
					<th>Dep-Kom</th>
					<th>Satker</th>
					<th>Direktorat</th>
					<th>Periode</th>
					<th>Nilai</th>
					<th>OJK Melayani<br>(20% )</th>
					<th>OJK Peduli<br>(20% )</th>
					<th>Budaya Spesifik<br>(20% )</th>
					<th>Peran Pimpinan<br>(20% )</th>
				</tr>
			</thead>
			<tbody>
				@foreach($user as $data)
				<tr>
					<td class="text-center">{{$data->deputi_kom}}</td>
					<td class="text-center">{{$data->satker}}</td>
					<td class="text-center">{{$data->direktorat_id}}</td>
					<td class="text-center">{{date('M',strtotime($periode->sejak))}} - {{date('M',strtotime($periode->hingga))}}</td>
					<td class="text-center">{{$data->hasil}}</td>
					<td class="text-center">{{$data->hasil_melayani}}</td>
					<td class="text-center">{{$data->hasil_peduli}}</td>
					<td class="text-center">{{$data->hasil_inovatif}}</td>
					<td class="text-center">{{$data->hasil}}</td>
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