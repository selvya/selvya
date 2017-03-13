@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-group"></i>
				<b>User</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>User</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="text-right">
			<a href="{{url('user/tambah')}}" class="btn btn-success" data-toggle="tooltip" title="Tambah User"><i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-striped table-bordered table-hover dataTable no-footer" id="myTable" aria-describedby="dataTables-example_info">
			<tr role="row">
				<th>ID</th>
				<th>Username</th>
				<th>Otoritas</th>
				<th>Bidang</th>
				<th>DepKom</th>
				<th>Satker</th>
				<th>Tipe Kantor</th>
				<th>Action</th>
			</tr>		
			<?php  
			//$user = \App\User::join('komisioner', 'users.deputi_kom', '=', 'komisioner.id')->join('satker', 'users.satker', '=', 'satker.id')->join('departemen', 'users.departemen', '=', 'departemen.id')->join('direktorat', 'users.direktorat_id', '=', 'direktorat.id')->select('users.*', 'satker.nama', 'departemen.departemen_name','direktorat.direktorat_name','komisioner.komisioner_name')->get();
			$user = \App\User::all();
			?>
			@foreach($user as $data)
			<tr class="odd text-center">
				<td>{{$data->id}}</td>
				<td>{{$data->username}}</td>
				<td>{{$data->otoritas}}</td>
				<td></td>
				<td>{{$data->komisioner_name}}</td>
				<td>{{$data->nama}}</td>
				<td>{{$data->kojk}}</td>
				<td>
					<a href="{{url('user/hapus/'.$data->id)}}" class="btn btn-danger" onclick="return confirm('Apa anda yakin ingin mengahpus user ini ?');"><i class="fa fa-trash-o"></i> Hapus</a>
					<a href="{{url('user/edit/'.$data->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
				</td>
			</tr>
			@endforeach
		</table>		
	</div>
	<!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<!-- END Page Content -->
@endsection
@section('js')
<script src="{{asset('vendor/js/pages/tablesDatatables.js')}}"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#myTable').DataTable();
	});
</script>
@endsection