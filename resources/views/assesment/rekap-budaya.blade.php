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
	$all= \App\Iku::where('inovatif_triwulan', $triwulan['current']['triwulan'])
	->where('daftarindikator_id','3')
	->join('users','iku.satker','=','users.id')
	->get();

	$final = \App\Iku::where('inovatif_triwulan', $triwulan['current']['triwulan'])
	->where('daftarindikator_id','3')
	->where('isfinal', 'y')
	->join('users','iku.satker','=','users.id')
	->get();

	$belumfinal = \App\Iku::where('inovatif_triwulan', $triwulan['current']['triwulan'])
	->where('daftarindikator_id','3')
	->where('isfinal', 't')
	->join('users','iku.satker','=','users.id')
	->get();
	?>

	<!-- Datatables Content -->
	<div class="block full">
		<div class="text-right">
			<a href="{{url('arsip/assessment')}}" class="btn btn-default" data-toggle="tooltip" title="Lihat Arsip Assessment"><i class="fa fa-eye"></i></a>
		</div>
		<br>
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
				<div class="container">
					<b>Rekapitulasi:</b> <br>
					<span class="btn btn-success"><b>Sudah Final</b><br><big>{{count($final)}}</big></span>
					<span class="btn btn-danger"><b>Belum Final</b><br><big>{{count($belumfinal)}}</big></span>
				</div>
			</div>

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