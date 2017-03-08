@extends('layout.master')
@section('css')
<style type="text/css">
	th{text-align: center;}
</style>
@endsection
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-tags"></i>
				<b>Lomba Kreasi Kreatif</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Lomba Kreasi Kreatif</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="table-responsive">
			<div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
				<div class="row">
					<div class="col-sm-12">
						<div id="dataTables-example_filter" class="dataTables_filter">
							<label>Search:<input type="search" class="form-control input-sm" aria-controls="dataTables-example">
							</label>
						</div>
					</div>
				</div>
				<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
					<thead>
						<tr role="row">
							<th>Nama</th>
							<th>Otoritas</th>
							<th>Deputi</th>
							<th>Departemen</th>
							<th>KOJK</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd text-center">
							<td>Ilham</td>
							<td>Full Stack Developer</td>
							<td>Full Stack Developer</td>
							<td>IT Creative</td>
							<td>Full Stack Developer</td>
							<td>
								<a href="{{url('tambah/lomba/')}}" class="btn btn-success" data-toggle="tooltip" title="Tambah Lomba Kreasi Kreatif">Tambah</a>
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