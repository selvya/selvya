@extends('layout.master')

@section('content')
{{-- {{dd($anggaran->tahun)}} --}}

<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-imac"></i>
				<b>Anggaran Program Budaya</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Anggaran Program Budaya</li>
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
		<div class="table-responsive">
			<table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
				<thead>
					<tr>
						<th class="text-center">Tahun</th>
						<th class="text-center">Budget Tahunan</th>
						<th class="text-center">Pengaturan</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center">{{$anggaran->tahun}}</td>
						<td class="text-center">{{'Rp. ' . number_format($anggaran->total_anggaran, 0, ',' , '.')}}</td>
						<td class="text-center">
							<div class="btn-group">
								<a href="{{url('lihat-anggaran')}}" data-toggle="tooltip" title="Lihat" class="btn btn-warning"><i class="fa fa-eye"></i></a>
								<a href="{{url('ubah-anggaran')}}" data-toggle="tooltip" title="Ubah" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
							</div>
						</td>
					</tr>
					
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
	<script>$(function(){ TablesDatatables.init(); });</script>
@endsection