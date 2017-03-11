@extends('layout.master')
@section('content')
<div id="page-content">
	<!-- Wizard Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="fa fa-user-plus"></i>
				<b>Tambah User</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li><a href="{{url('user')}}">User</a></li>
		<li>Tambah User</li>
	</ul>
	<!-- END Wizard Header -->

	<!-- Wizards Row -->
	<div class="row">
		<div class="col-md-12">
			<!-- Wizard with Validation Block -->
			<div class="block">
				<!-- Wizard with Validation Title -->
				<div class="block-title">
					<h2><strong>Form</strong></h2>
				</div>
				@include('include.alert')
				<form action="{{url('user/edit/proses/'.$user->id)}}" class="form-horizontal" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<label class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="Username" name="username" value="{{$user->username}}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" placeholder="Password" name="password">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Otoritas</label>
						<div class="col-sm-10">
							<select name="otoritas" class="form-control">
								<option value="{{$user->otoritas}}">{{$user->otoritas}}</option>
								<option value="Admin">Admin</option>
								<option value="DPMB">DMPB</option>
								<option value="Pusat">Pusat</option>
								<option value="Kantor Regional">Kantor Regional</option>
								<option value="KOJK">KOJK</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Deputi Komisioner</label>
						<div class="col-sm-10">
							<select name="deputi" class="form-control">
								<?php 
								$kom = \App\Komisioner::findOrFail($user->deputi_kom); ?>
								<option value="{{$kom->id}}">{{$kom->komisioner_name}}</option>
								@forelse($komisioner as $k => $v)
								<option value="{{$v->id}}">{{$v->komisioner_name}}</option>
								@empty
								@endforelse
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Departmen</label>
						<div class="col-sm-10">
							<select name="departemen" class="form-control">
								<?php 
								$dep = \App\Departemen::findOrFail($user->departemen); ?>
								<option value="{{$dep->id}}">{{$dep->departemen_name}}</option>
								@forelse($departemen as $k => $v)
								<option value="{{$v->id}}">{{$v->departemen_name}}</option>
								@empty
								@endforelse
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">KOJK</label>
						<div class="col-sm-10">
							<select name="kojk" class="form-control">
								<?php $dir = \App\Direktorat::findOrFail($user->direktorat_id); ?>
								<option value="{{$dir->id}}">{{$dir->direktorat_name}}</option>
								@forelse($kojk as $k => $v)
								<option value="{{$v->id}}">{{$v->direktorat_name}}</option>
								@empty
								@endforelse
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Change Partner</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="change" placeholder="Change Partner" value="{{$user->change_partner}}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Pimpinan Satker/Direktorat</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="satker" placeholder="Nama Pimpinan" value="{{$user->satker}}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Jabatan</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="jabatan" placeholder="Jabatan" value="{{$user->jabatan}}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-success">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- END Wizards Row -->	
</div>
@endsection
@section('js')
@endsection