@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-sort"></i>
				<b>Rekap Budaya Assessment</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Rekap Budaya Assessment</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="text-right">
			<a href="{{url('arsip/assessment')}}" class="btn btn-default" data-toggle="tooltip" title="Lihat Arsip Assessment"><i class="fa fa-eye"></i></a>
		</div>
		<br>
		<div class="panel panel-default">
			<div class="panel-heading">
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
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body" style="padding:0px; margin-top:5px; margin-left:-1px;">
				<div class="container" style=" width:100%;margin-bottom: 5px;">
					<b>Rekapitulasi:</b>
					<table>
						<tr>
							<td style="background-color: #ececec;" align="center">
								&nbsp;Sudah Final&nbsp;<br>
								<a href="#" class="btn btn-success">3</a>
							</td>
							<td>&nbsp;</td>
							<td style="background-color: #ececec;" align="center">
								&nbsp;Belum Final&nbsp;<br>
								<a href="#" class="btn btn-danger">0</a>
							</td>
						</tr>
					</table>
				</div>
			</div>

			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th>Deputi Komisioner</th>
						<th>Departemen</th>
						<th style="width:13%;">KOJK</th>
						<th style="width:13%;text-align:center">Nama Program</th>
						<th style="width:13%;text-align:center">Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Manajemen Strategis IB</td>
						<td>Perencanaan Strategis, Manajemen Perubahan dan Sekretariat Dewan Komisioner</td>
						<td> N/A</td>
						<td>DSMS Inovatif Oke!</td>
						<td style="text-align:center">
							<label class="btn btn-success modalBox" id="bootBox0" data-program-id="352" data-state-id="1" data-desc-id="DSMS Inovatif Oke!">Sudah Final</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IB</td>
						<td>Komunikasi dan Internasional</td>
						<td> N/A</td>
						<td>OJK Peduli</td>
						<td style="text-align:center">
							<label class="btn btn-success modalBox" id="bootBox1" data-program-id="354" data-state-id="1" data-desc-id="OJK Peduli">Sudah Final</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IB</td>
						<td>Komunikasi dan Internasional</td>
						<td> N/A</td>
						<td>OJK Melayani</td>
						<td style="text-align:center">
							<label class="btn btn-success modalBox" id="bootBox2" data-program-id="355" data-state-id="1" data-desc-id="OJK Melayani">Sudah Final</label>
						</td>
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
@endsection