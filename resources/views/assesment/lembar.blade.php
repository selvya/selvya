@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-sort"></i>
				<b>Lembar Assessment</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Lembar Assessment</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="table-responsive">
			<table>
				<tr>
					<td><b>Deputi Komisioner</b></td>
					<td>:</td>
					<td>Manajemen Strategis IB</td>
				</tr>
				<tr>
					<td><b>Satuan Kerja</b></td>
					<td>:</td>
					<td>Perencanaan Strategis, Manajemen Perubahan dan Sekretariat Dewan Komisioner</td>
				</tr>
				<tr>
					<td><b>Direktorat/KOJK</b></td>
					<td>:</td>
					<td>N/A</td>
				</tr>
			</table>
		</div>
		<div class="text-right">
			<a href="{{url('arsip/assessment')}}" class="btn btn-default" data-toggle="tooltip" title="Lihat Arsip Assessment">Arsip</a>
		</div>
		<br>
		<div class="table-responsive">
			<div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
				<div class="row">
					<div class="col-sm-6">
						<div class="dataTables_length" id="dataTables-example_length">
							<label>
								<select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm">
									<option value="10">10</option>
									<option value="25">25</option>
									<option value="50">50</option>
									<option value="100">100</option>
								</select>
								records per page
							</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div id="dataTables-example_filter" class="dataTables_filter">
							<label>
								Search:<input type="search" class="form-control input-sm" aria-controls="dataTables-example">
							</label>
						</div>
					</div>
				</div>
				<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
					<thead>
						<tr role="row">
							<th style="width: 113px;" class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Bulan/Periode: activate to sort column ascending">
								Bulan/Periode
							</th>
							<th style="width: 83px;" class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Tahun: activate to sort column ascending">
								Tahun
							</th>
							<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Progress: activate to sort column ascending" style="width: 471px;">
								Progress
							</th>
							<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Pengaturan: activate to sort column ascending" style="width: 273px;">
								Pengaturan
							</th>
						</tr>
					</thead>
					<tbody>

						<tr class="odd">
							<td class="text-center">Januari - Maret</td>
							<td class="text-center">2017</td>
							<td >
								<div>
									<p>
										<strong>Terakhir diubah :</strong> 20-12-2019
										<span class="text-muted pull-right">20% Complete</span>
									</p>
									<div class="progress progress-striped active">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
											<span class="sr-only">20% Complete</span>
										</div>
									</div>
								</div>
							</td>
							<td class="text-center">
							<br>
								<a href="{{url('edit-self-assessment')}}" class="btn btn-warning">Ubah 
								</a>
							</td>
						</tr>
						<tr class="odd">
							<td class="text-center">Januari - Maret</td>
							<td class="text-center">2017</td>
							<td >
								<div>
									<p>
										<strong>Final pada :</strong> 20-12-2019
										<span class="text-muted pull-right">100% Complete</span>
									</p>
									<div class="progress progress-striped">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
											<span class="sr-only">100% Complete</span>
										</div>
									</div>
								</div>
							</td>
							<td class="text-center">
							<br>
								<a href="{{url('#')}}" class="btn btn-primary">Preview </a>
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