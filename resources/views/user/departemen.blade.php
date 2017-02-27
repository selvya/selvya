@extends('layout.master')
@section('css')
@endsection
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-group"></i>
				<b>Departemen</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Departemen</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="text-right">
			<a href="{{url('departemen/tambah')}}" class="btn btn-success" data-toggle="tooltip" title="Tambah Departemen"><i class="fa fa-plus"></i></a>
		</div>
		<br>
		@include('include.alert')
		<br>
		<div>
			{!! $dataTable->table() !!}
		</div>
	</div>
	<!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<!-- END Page Content -->
@endsection
@section('js')
{!! $dataTable->scripts() !!}
@endsection