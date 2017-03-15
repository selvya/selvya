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

	@if($persen != null)
		@if($persen->nilai > 0)
			<div class="col-sm-6 col-lg-4">
				<!-- Widget -->
				<a href="" class="widget widget-hover-effect1">
					<div class="widget-simple">
						<div class="widget-icon pull-left themed-background-spring animation-fadeIn">
							<i class="fa fa-line-chart"></i>
						</div>
						<h3 class="widget-content text-right animation-pullDown">
							{{$persen->nilai}}% <strong>Persentase</strong><br>
							<small>Triwulan {{$triwulan['current']['triwulan']}}</small>
						</h3>
					</div>
				</a>
				<!-- END Widget -->
			</div>
		@endif
	@endif

	<!-- Datatables Content -->
	<div class="block full col-md-12" style="overflow: hidden;">
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
				@if($persen->nilai > 0 )
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
				@else
				<div class="alert alert-warning">
					Pada triwulan ini Survei Budaya Internal tidak dapat di input
				</div>
				@endif
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