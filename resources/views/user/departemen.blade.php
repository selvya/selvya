@extends('layout.master')
@section('css')
@endsection
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	 <div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1 style="text-transform: uppercase">Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Departemen</h4>
                </div>
            </div>
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