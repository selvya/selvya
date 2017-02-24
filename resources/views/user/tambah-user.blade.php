@extends('layout.master')
@section('content')
<div id="page-content">
	<!-- Wizard Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="fa fa-user-plus"></i>
				Tambah User
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
				<form class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="Username">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" placeholder="Password">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Otoritas</label>
						<div class="col-sm-10">
							<select name="otoritas" class="form-control">
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
							<select name="komisioner" class="form-control">
								<option>-- Pilih --</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Departmen</label>
						<div class="col-sm-10">
							<select name="departmen" class="form-control">
								<option>-- Pilih --</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">KOJK</label>
						<div class="col-sm-10">
							<select name="kojk" class="form-control">
								<option>-- Pilih --</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Change Partner</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="partner" placeholder="Change Partner">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Pimpinan Satker/Direktorat</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="pimpinan" placeholder="Nama Pimpinan">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Jabatan</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="jabatans" placeholder="Jabatan">
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