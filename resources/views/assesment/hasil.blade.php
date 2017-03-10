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

	<!-- Datatables Content -->
	<div class="block full">
		<div class="text-right">
			<a href="{{url('arsip/assessment')}}" class="btn btn-default" data-toggle="tooltip" title="Lihat Arsip Assessment"><i class="fa fa-eye"></i></a>
		</div>
		<br>
		<div class="panel panel-default">
			<div class="panel-heading">
				<form method="post" enctype="multipart/form-data" action="" style="margin:0">
					<select name="tipe">
						<option value="2" selected="selected">Kantor Pusat</option>
						<option value="3">Kantor Regional</option>
						<option value="4">Kantor KOJK</option>
						<option value="5">OJK-wide</option>
					</select>&nbsp;						&nbsp;&nbsp;Period&nbsp;:
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
		</div>
		<div class="panel-body" style="padding:0px; margin-top:5px; margin-left:-1px;">
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
		</div>
		<div class="panel-body" style="padding:0px; margin-top:5px; margin-left:-1px;">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th style="width:5%; vertical-align: middle;">Deputi Komisioner</th>
						<th style="width:5%; vertical-align: middle;">Satuan Kerja</th>
						<th style="width:5%; vertical-align: middle;">Direktorat / KOJK</th>
						<th style="text-align:center; vertical-align: middle; width:10%">Periode</th>
						<th style="text-align:center; vertical-align: middle; width:8%">Nilai</th>
						<th style="text-align:center; vertical-align: middle; width:10%">Program Budaya Spesifik<br>(20% )</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Manajemen Strategis IA</td>
						<td>Pengembangan Kebijakan Strategis</td>
						<td> N/A</td>
						<td style="text-align:center; vertical-align: middle;"></td>
						<td style="text-align:center; vertical-align: middle;">
							-										
						</td>
						<td style="text-align:center; vertical-align: middle;">
							-										
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IB</td>
						<td>Perencanaan Strategis, Manajemen Perubahan dan Sekretariat Dewan Komisioner</td>
						<td> N/A</td>
						<td style="text-align:center; vertical-align: middle;"></td>
						<td style="text-align:center; vertical-align: middle;">
							-										
						</td>
						<td style="text-align:center; vertical-align: middle;">
							-										
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IB</td>
						<td>Komunikasi dan Internasional</td>
						<td> N/A</td>
						<td style="text-align:center; vertical-align: middle;"></td>
						<td style="text-align:center; vertical-align: middle;">
							-										
						</td>
						<td style="text-align:center; vertical-align: middle;">
							-										
						</td>
					</tr>
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
@endsection