@extends('layout.master')
@section('content')
<div id="page-content">
	<!-- Wizard Header -->
	<div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1>Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Edit User</h4>
                </div>
            </div>
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
							<input type="password" class="form-control" placeholder="Password" name="password"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Konfirmasi Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" placeholder="Ketik Ulang Password" name="password2"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Change Partner</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="Change Partner" name="change_partner" value="{{$user->change_partner}}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama Pengisi</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="Nama Pengisi" name="namapengisi" value="{{$user->namapengisi}}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama Pimpinan</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="Nama Pimpinan" name="namapimpinan" value="{{$user->namapimpinan}}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Jabatan Pimpinan</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="Jabatan Pimpinan" name="jabatanpimpinan" value="{{$user->jabatanpimpinan}}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Jumlah Insan OJK</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="0-500" name="jumlahinsan" value="{{$user->jumlahinsan}}">
						</div>
					</div>
					<?php /*<div class="form-group">
						<label class="col-sm-2 control-label">Otoritas</label>
						<div class="col-sm-10">
							<select name="level" class="form-control">
								<option value="satker" @if($user->level == 'satker') selected @endif>Satuan Kerja</option>
								<option value="reviewer" @if($user->level == 'reviewer') selected @endif>Reviewer</option>
								<option value="pusat" @if($user->level == 'pusat') selected @endif>Pusat</option>
								<option value="regional" @if($user->level == 'regional') selected @endif>Kantor Regional</option>
								<option value="kojk" @if($user->level == 'kojk') selected @endif>KOJK</option>
								<option value="admin" @if($user->level == 'admin') selected @endif>Admin</option>
							</select>
						</div>
					</div> */ ?>
					<div class="form-group">
						<label class="col-sm-2 control-label">Deputi Komisioner</label>
						<div class="col-sm-10">
							<select name="deputi" class="form-control">
								<option value="">Pilih Deputi Komisioner Terkait</option>
								@forelse($komisioner as $k => $v)
									<option value="{{$v->id}}" @if($user->deputi_kom == $v->id) selected @endif>{{$v->komisioner_name}}</option>
								@empty
								@endforelse
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Departemen</label>
						<div class="col-sm-10">
							<select name="departemen" class="form-control">
								<option value="">Pilih Departemen Terkait</option>
								@forelse($departemen as $k => $v)
								<option value="{{$v->id}}" @if($user->departemen == $v->id) selected @endif>{{$v->departemen_name}}</option>
								@empty
								@endforelse
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Direktorat - KOJK</label>
						<div class="col-sm-10">
							<select name="kojk" class="form-control">
								<option value="">Pilih Direktorat Terkait</option>
								@forelse($kojk as $k => $v)
								<option value="{{$v->id}}" @if($user->kojk == $v->id) selected @endif>{{$v->direktorat_name}}</option>
								@empty
								@endforelse
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Jenis Kantor</label>
						<div class="col-sm-10">
							<select name="jenis_kantor" class="form-control">
								<option value="Kantor Pusat" @if($user->jenis_kantor == 'Kantor Pusat') selected @endif>Kantor Pusat</option>
								<option value="Kantor Regional" @if($user->jenis_kantor == 'Kantor Regional') selected @endif>Kantor Regional</option>
								<option value="OJK Wide" @if($user->jenis_kantor == 'OJK Wide') selected @endif>OJK Wide</option>
							</select>
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