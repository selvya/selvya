@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-tags"></i>
				<b>OJK Inovatif</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>OJK Inovatif</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="text-right">
			<a href="{{url('arsip/inovatif')}}"" class="btn btn-default" data-toggle="tooltip" title="Arsip OJK Inovatif">Arsip</a>
			<a href="{{url('tambah/inovatif')}}" class="btn btn-success" data-toggle="tooltip" title="Tambah OJK Inovatif">Tambah</a>
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
							<label>Search:<input type="search" class="form-control input-sm" aria-controls="dataTables-example">
							</label>
						</div>
					</div>
				</div>
				<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
					<thead>
						<tr role="row">
							<th style="text-align: center; width: 287px;" class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nama Program: activate to sort column ascending">
								Nama Program
							</th>
							<th style="text-align: center; width: 323px;" class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Deskripsi Program: activate to sort column ascending">
								Deskripsi Program
							</th>
							<th style="text-align: center; width: 197px;" class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Tujuan: activate to sort column ascending">
								Tujuan
							</th>
							<th style="width: 133px; text-align: center;" class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Pengaturan: activate to sort column ascending">
								Pengaturan
							</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd">
							<td class="text-center sorting_1">DSMS Inovatif Oke!</td>
							<td class="text-center">l agmklamglrmgl</td>
							<td class="text-center">kf kafjklkfjkal</td>
							<td align="center">
								<a href="{{url('detail/inovatif')}}" class="btn btn-primary">View</a>			
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