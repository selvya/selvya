@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="fa fa-table"></i>
				<b>Monitoring Anggaran</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Tables</li>
		<li><a href="">Datatables</a></li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="block-title">
			<h2><strong>Datatables</strong> integration</h2>
		</div>
		<p><a href="https://datatables.net/" target="_blank">DataTables</a> is a plug-in for the Jquery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, which will add advanced interaction controls to any HTML table. It is integrated with template's design and it offers many features such as on-the-fly filtering and variable length pagination.</p>

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
								<a href="javascript:void(0)" data-toggle="tooltip" title="Sunting" class="btn btn-default"><i class="fa fa-pencil"></i></a>
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
								<a href="javascript:void(0)" data-toggle="tooltip" title="Sunting" class="btn btn-default"><i class="fa fa-pencil"></i></a>
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
								<a href="javascript:void(0)" data-toggle="tooltip" title="Sunting" class="btn btn-default"><i class="fa fa-pencil"></i></a>
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