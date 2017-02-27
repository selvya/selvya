@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-group"></i>
				<b>Direktorat</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Direktorat</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="text-right">
			<a href="{{url('direktorat/tambah')}}" class="btn btn-success" data-toggle="tooltip" title="Tambah Direktorat"><i class="fa fa-plus"></i></a>
		</div>
		<br>
		@include('include.alert')
		<br>
		<div class="table-responsive">
			{!!$dataTable->table()!!}
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
{!! $dataTable->scripts() !!}
@endsection