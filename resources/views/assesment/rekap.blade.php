@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-sort"></i>
				<b>Rekap Assessment</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Rekap Assessment</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="text-right">
			<a href="{{url('arsip/assessment')}}" class="btn btn-default" data-toggle="tooltip" title="Lihat Arsip Assessment"><i class="fa fa-eye"></i></a>
		</div>
		<br>
		<div class="panel panel-default">
<!-- 			<div class="panel-heading">
				<form method="post" enctype="multipart/form-data" action="">
					<select name="tipe">
						<option value="2" selected="selected">Kantor Pusat</option>
						<option value="3">Kantor Regional</option>
						<option value="4">Kantor KOJK</option>
						<option value="5">OJK-wide</option>
					</select>&nbsp;							Periode&nbsp;:&nbsp;&nbsp;
					<select name="month">
						<option value="13" selected="selected">Januari - Maret</option>
						<option value="14">April - Juni</option>
						<option value="15">Juli - September</option>
						<option value="16">Oktober-Desember</option>
					</select>&nbsp;<select name="year">
					<option value="2017" selected="selected">2017</option>
					<option value="2016">2016</option>
					<option value="2015">2015</option>
				</select>&nbsp;			
				<a class="btn btn-primary">Lihat&nbsp;<i class="fa fa-arrow-circle-o-right"></i></a>
			</form>
		</div>
		<div class="panel-body" style="padding:0px; margin-top:5px; margin-left:-1px;">
			<div class="container" style=" width:100%;margin-bottom: 5px;">
				<b>Detail Rekapitulasi:</b>
				<table>
					<tr>
						<td style="background-color: #ececec;" align="center">
							&nbsp;Sudah Submit&nbsp;<br>
							<a href="#" class="btn btn-success">0</a>
						</td>
						<td>&nbsp;</td>
						<td style="background-color: #ececec;" align="center">
							&nbsp;Belum Submit&nbsp;<br>
							<a href="#" class="btn btn-danger">66</a>
						</td>
					</tr>
				</table>
			</div>
		</div> -->
		<div class="panel-body" style="padding:0px; margin-top:5px; margin-left:-1px;">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th>Deputi Komisioner</th>
						<th>Departemen</th>
						<th>KOJK</th>
						<th>Progress</th>
					</tr>
				</thead>
				<?php 
				$triwulan = cekCurrentTriwulan();
				$satker =  \App\ReportAssessment::select('*',DB::raw('user_id'))
				->where('triwulan',$triwulan['current']['triwulan'])
				->where('tahun',date('Y'))
				->join('users','report_assesment.user_id','=','users.id')
				->groupBy('report_assesment.user_id')
				->get();
				// dd($satker);
				?>
				<tbody>
					@foreach($satker as $data)
					<tr>
						<td>{{$data->deputi}}</td>
						<td>{{$data->departemen}}</td>
						<td>{{$data->kojk}}</td>
						<td><label class="btn btn-danger" id="bootBox0">Belum Submit</label></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- /.panel-body -->
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
@endsection