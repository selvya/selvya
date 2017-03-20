@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-imac"></i>
				<b>Hasil Monitoring</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Hasil Monitoring</li>
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
				<form method="post" enctype="multipart/form-data" style="margin:0">
					<select name="tipe">
						<option value="2" selected="selected">Kantor Pusat</option>
						<option value="3">Kantor Regional</option>
						<option value="4">Kantor KOJK</option>
						<option value="5">OJK-wide</option>
					</select>&nbsp;						Period&nbsp;:&nbsp;&nbsp;
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
				<a href="#" class="btn btn-success"><i class="fa fa-print"></i>&nbsp;Export ke Excel</a>
			</form>
		</div> -->
		<!-- /.panel-heading -->
		<!-- <div class="panel-body" style="padding:0px; margin-top:5px; margin-left:-1px;">
			<div class="container-fluid" style="margin-bottom: 5px;">
				<b>Nilai Rata-Rata per Program:</b>
				<table>
					<tr>
						<td style="background-color: #ececec;" align="center">
							&nbsp;Program Budaya Spesifik&nbsp;<br>
							<label class="btn btn-danger">0</label><br>
						</td>
						<td>&nbsp;</td>
						<td style="background-color: #ececec;" align="center">
							&nbsp;<b>Total</b>&nbsp;<br>
							<label class="btn btn-danger">0</label><br>
						</td>
						<td>&nbsp;</td>
					</tr>
				</table>
			</div>
		</div> -->
		<table class="table table-striped table-bordered table-hover" id="myTable">
			<thead>
				<tr>
					<th>Deputi Komisioner</th>
					<th>Satuan Kerja</th>
					<th>Direktorat / KOJK</th>
					<th>Periode</th>
					<th>Nilai</th>
					<th>Program Budaya Spesifik<br>(20% )</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Manajemen Strategis IA</td>
					<td>Pengembangan Kebijakan Strategis</td>
					<td> N/A</td>
					<td></td>
					<td>-</td>
					<td>-</td>

				</tr>
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