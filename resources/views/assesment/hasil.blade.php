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
		<div class="table-responsive">
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