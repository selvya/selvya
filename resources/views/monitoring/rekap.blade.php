@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header content-media">
		<div class="header-section">
			<div class="jumbotron" >
				<div class="col-md-12">
					<h1>Salam <b>Perubahan</b></h1>
					<h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Rekap Monitoring</h4>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Rekap Monitoring</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="table-responsive">
			<table>
				<tr>
					<td>Deputi Komisioner</td>
					<td>:</td>
					<td>Manajemen Strategis IB</td>
				</tr>
				<tr>
					<td>Satuan Kerja</td>
					<td>:</td>
					<td>Perencanaan Strategis, Manajemen Perubahan dan Sekretariat Dewan Komisioner</td>
				</tr>
				<tr>
					<td>Direktorat/KOJK</td>
					<td>:</td>
					<td>N/A</td>
				</tr>
			</table>
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
					</select>&nbsp;						&nbsp;Periode&nbsp;:
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
				<a class="btn btn-primary">Lihat <i class="fa fa-arrow-circle-o-right"></i></a>
			</form>
		</div>
		<div class="panel-body" style="padding:0px; margin-top:5px; margin-left:-1px;">
			<div class="container" style=" width:100%;margin-bottom: 5px;">
				<b>Detail Rekapitulasi:</b>
				<table>
					<tr>
						<td style="background-color: #ececec;" align="center">
							&nbsp;Sudah Dilakukan&nbsp;<br>
							<a href="#" class="btn btn-success">0</a>
						</td>
						<td>&nbsp;</td>
						<td style="background-color: #ececec;" align="center">
							&nbsp;Belum Dilakukan&nbsp;<br>
							<a href="#" class="btn btn-danger">66</a>
						</td>
					</tr>
				</table>
			</div>
		</div> -->
		<?php
		$triwulan = cekCurrentTriwulan();
		$all= DB::table('monitoring')->where('monitoring.tahun',date('Y'))
		->where('monitoring.triwulan',$triwulan['current']['triwulan'])
		->join('users','monitoring.user_id','=','users.id')
		->join('selfassesment','monitoring.selfassesment_id','=','selfassesment.id')
		->get();

			// dd($all);

		// $final = \App\ReportAssessment::where('daftarindikator_id','2')
		// ->where('tahun',date('Y'))
		// ->where('triwulan',$triwulan['current']['triwulan'])
		// ->where('final_status','1')
		// ->join('users','report_assesment.user_id','=','users.id')
		// ->get();

		// $belumfinal = \App\ReportAssessment::where('daftarindikator_id','2')
		// ->where('tahun',date('Y'))
		// ->where('triwulan',$triwulan['current']['triwulan'])
		// ->where('final_status','0')
		// ->join('users','report_assesment.user_id','=','users.id')
		// ->get();
		?>

		<table class="table table-striped table-bordebtn-danger table-hover" id="myTable">
			<thead>
				<tr>
					<th class="text-center">Username</th>
					<th class="text-center">Deputi Komisioner</th>
					<th class="text-center">Departemen</th>
					<th class="text-center">KOJK</th>
					<th class="text-center">Status Monitoring</th>
				</tr>
			</thead>
			<tbody>
				@foreach($all as $data)
				<tr>
					<td class="text-center">{{$data->username}}</td>
					<td class="text-center">{{$data->deputi_kom}}</td>
					<td class="text-center">{{$data->departemen}}</td>
					<td class="text-center">{{$data->kojk}}</td>

					<td class="text-center">
						<label class="btn btn-danger">Belum Dilakukan Monitoring</label>
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