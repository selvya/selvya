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
		<a href="{{url('arsip/inovatif')}}"" class="btn btn-default" data-toggle="tooltip" title="Lihat OJK Inovatif"><i class="fa fa-eye"></i></a>
			<a href="{{url('tambah/inovatif')}}" class="btn btn-success" data-toggle="tooltip" title="Tambah OJK Inovatif"><i class="fa fa-plus"></i></a>
		</div>
		<br>
		<div class="table-responsive">
			<table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th class="text-center"><i class="gi gi-user"></i></th>
						<th>Client</th>
						<th>Email</th>
						<th>Subscription</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center">1</td>
						<td class="text-center"><img src="{{asset('vendor/img/placeholders/avatars/avatar11.jpg')}}" alt="avatar" class="img-circle"></td>
						<td><a href="javascript:void(0)">client1</a></td>
						<td>client1@company.com</td>
						<td><span class="label label-info">Business</span></td>
						<td class="text-center">
							<div class="btn-group">
								<a href="javascript:void(0)" data-toggle="tooltip" title="Lihat" class="btn btn-warning"><i class="fa fa-eye"></i></a>
								<a href="javascript:void(0)" data-toggle="tooltip" title="Sunting" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
								<a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" class="btn btn-danger"><i class="fa fa-times"></i></a>
							</div>
						</td>
					</tr>
					<tr>
						<td class="text-center">2</td>
						<td class="text-center"><img src="{{asset('vendor/img/placeholders/avatars/avatar9.jpg')}}" alt="avatar" class="img-circle"></td>
						<td><a href="javascript:void(0)">client2</a></td>
						<td>client2@company.com</td>
						<td><span class="label label-warning">Trial</span></td>
						<td class="text-center">
							<div class="btn-group">
								<a href="javascript:void(0)" data-toggle="tooltip" title="Lihat" class="btn btn-warning"><i class="fa fa-eye"></i></a>
								<a href="javascript:void(0)" data-toggle="tooltip" title="Sunting" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
								<a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" class="btn btn-danger"><i class="fa fa-times"></i></a>
							</div>
						</td>
					</tr>
					<tr>
						<td class="text-center">3</td>
						<td class="text-center"><img src="{{asset('vendor/img/placeholders/avatars/avatar15.jpg')}}" alt="avatar" class="img-circle"></td>
						<td><a href="javascript:void(0)">client3</a></td>
						<td>client3@company.com</td>
						<td><span class="label label-success">VIP</span></td>
						<td class="text-center">
							<div class="btn-group">
								<a href="javascript:void(0)" data-toggle="tooltip" title="Lihat" class="btn btn-warning"><i class="fa fa-eye"></i></a>
								<a href="javascript:void(0)" data-toggle="tooltip" title="Sunting" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
								<a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" class="btn btn-danger"><i class="fa fa-times"></i></a>
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
<!-- END Page Content -->
@endsection
@section('js')
<script src="{{asset('vendor/js/pages/tablesDatatables.js')}}"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection