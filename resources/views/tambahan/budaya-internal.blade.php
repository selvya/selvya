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
				<b>Budaya Internal</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Budaya Internal</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
	<table class="table table-striped table-bordered table-hover dataTable no-footer" id="myTable" aria-describedby="dataTables-example_info">
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
				@foreach($user as $data)
				<tr class="odd text-center">
					<td>{{$data->username}}</td>
					<td>{{$data->ototritas}}</td>
					<td>{{$data->deputi_kom}}</td>
					<td>{{$data->departemen}}</td>
					<td>{{$data->kojk}}</td>
					<td>
						<a href="{{url('tambah/budaya-internal/'.$data->id)}}" class="btn btn-success" data-toggle="tooltip" title="Tambah Budaya Internal">Tambah</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<!-- END Datatables Content -->
	</div>
	<!-- END Page Content -->
	<!-- END Page Content -->
	@endsection
	@section('js')
	<script src="{{asset('vendor/js/pages/tablesDatatables.js')}}"></script>
	<script>$(function(){ TablesDatatables.init(); });</script>
	<script>$(function(){ TablesDatatables.init(); });</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#myTable').DataTable();
		});
	</script>
	@endsection