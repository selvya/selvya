@extends('layout.master')
@section('css')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css"> --}}
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"> --}}
<style>
	table.dataTable thead th, table.dataTable thead td{border-bottom: none;}
</style>
@endsection
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header content-media">
		<div class="header-section">
			<div class="jumbotron" >
				<div class="col-md-12">
					<h1 >Salam <b>Perubahan</b></h1>
					<h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Rekap Budaya Assessment</h4>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Rekap Budaya Assessment</li>
	</ul>
	<!-- END Datatables Header -->

	<?php
	$triwulan = cekCurrentTriwulan();

	$all = \App\User::where('level', 'satker')
	// ->join('iku', 'users.id','=','iku.satker')
	// ->where('iku.inovatif_triwulan', $triwulan['current']['triwulan'])
	// ->where('iku.daftarindikator_id','3')
	->get();

	$inovatif = \App\Iku::where('tahun',date('Y'))->where('programbudaya_id',3)->where('satker','!=',0)->where('inovatif_triwulan',cekCurrentTriwulan()['current']->triwulan)->groupBy('satker')->count();
	$satkernya = \App\User::where('level','satker')->count();

	// $final = \App\Iku::where('inovatif_triwulan', $triwulan['current']['triwulan'])
	// ->where('daftarindikator_id','3')
	// ->where('isfinal', 'y')
	// ->join('users','iku.satker','=','users.id')
	// ->get();

	// $belumfinal = \App\Iku::where('inovatif_triwulan', $triwulan['current']['triwulan'])
	// ->where('daftarindikator_id','3')
	// ->where('isfinal', 't')
	// ->join('users','iku.satker','=','users.id')
	// ->get();
	?>

	<!-- Datatables Content -->
	<div class="block full">
		<div class="text-right">
			<a href="{{url('arsip/assessment')}}" class="btn btn-default" data-toggle="tooltip" title="Lihat Arsip Assessment"><i class="fa fa-eye"></i></a>
		</div>
		<br>
		<div class="panel-heading">
			<form method="post" enctype="multipart/form-data" action="">
				<div class="col-md-2" style="padding: 0px;">
					<select name="tipe" class="form-control">
						<option value="2" selected="selected">Kantor Pusat</option>
						<option value="3">Kantor Regional</option>
						<option value="4">Kantor KOJK</option>
						<option value="5">OJK-wide</option>
					</select>
				</div>
				<div class="col-md-2" style="padding-right: 0px;">
					<select name="month" class="form-control">
						<option selected="selected">-- Periode --</option>
						<option value="13">Januari - Maret</option>
						<option value="14">April - Juni</option>
						<option value="15">Juli - September</option>
						<option value="16">Oktober-Desember</option>
					</select>
				</div>
				<div class="col-md-2" style="padding-right: 0px;">
					<select name="year" class="form-control">
						<option value="2017" selected="selected">2017</option>
						<option value="2016">2016</option>
						<option value="2015">2015</option>
					</select>
				</div>
				<br><br><br>
				<div class="pull-left">
					<a class="btn btn-primary">Lihat&nbsp;<i class="fa fa-arrow-circle-o-right"></i></a>
				</div>
			</form>
			<br><br><br>
			<div class="">
				<b>Rekapitulasi:</b> <br>
				<span class="btn btn-success"><big>{{count($inovatif)}}</big><br><b>Sudah Final</b></span>
				<span class="btn btn-danger"><big>{{$satkernya - count($inovatif)}}</big><br><b>Belum Final</b></span>
			</div>
		</div>
		<div class="panel panel-default">
			{{-- <div class="panel-heading">
				<form method="post" enctype="multipart/form-data" action="">
					Tahun&nbsp;:&nbsp;&nbsp;
					<select name="year">
						<option value="2017" selected="selected">2017</option>
						<option value="2016">2016</option>
						<option value="2015">2015</option>
					</select>&nbsp;							
					<a class="btn btn-primary">Lihat&nbsp;<i class="fa fa-arrow-circle-o-right"></i></a>
					<a href="#" class="btn btn-warning"><i class="fa fa-print"></i>&nbsp;Export ke Excel</a>
				</form>
			</div> --}}
			<!-- /.panel-heading -->
			<div class="panel-body">
				<table class="table table-striped table-bordered table-hover" id="myTable">
					<thead>
						<tr>
							<th class="text-center">Deputi Komisioner</th>
							<th class="text-center">Departemen</th>
							<th class="text-center">KOJK</th>
							<th class="text-center">Nama Program</th>
							<th class="text-center">Status</th>
						</tr>
					</thead>
					<tbody>
						@foreach($all as $data)
						<tr>
							<td class="text-center">{{$data->deputi_kom}}</td>
							<td class="text-center">{{$data->departemen}}</td>
							<td class="text-center">{{$data->kojk}}</td>
							<td class="text-center">{{$data->namaprogram}}</td>
							<td class="text-center"><h4><span class="label label-success">Sudah Final</span></h4></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
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
		$('#myTable').DataTable({
			
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			]
		});
	});
</script>
@endsection