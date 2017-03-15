@extends('layout.master')
@section('content')
<div id="page-content">
	<!-- Wizard Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="fa fa-magic"></i>
				Tambah Budaya Internal
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li><a href="{{url('budaya-internal')}}">Budaya Internal</a></li>
		<li>Tambah Budaya Internal</li>
	</ul>
	<!-- END Wizard Header -->

	<!-- Wizards Row -->
	<div class="row">
		<div class="col-md-12">
			<div class="block">
				<div class="block-title">
					<h2><strong>Form </strong></h2>
				</div>
				<div class="container" style="max-width:100%">

					@include('include.alert')

					<form action="{{url('proses/tambah/inovatif')}}" method="POST">
						{{csrf_field()}}
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Nama Program</label>
							<div class="col-md-10">
								<input class="form-control" type="text" name="nama">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Deskripsi Program</label>
							<div class="col-md-10">
								<textarea class="form-control" rows="5" name="deskripsi"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Latar Belakang </label>
							<div class="col-md-10">
								<input class="form-control" type="text" name="latarbelakang">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Sasaran Program</label>
							<div class="col-md-10">
								<input class="form-control" type="text" name="sasaran">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Tahapan Pelaksanaan </label>
							<div class="col-md-10">
								<input class="form-control" type="text" name="tahapan">
							</div>
						</div> 
						<div class="form-group row">
							<div class="col-md-12 text-center">
								<a href="{{url('budaya-internal')}}" class="btn btn-default btn-lg"><i class="fa fa-arrow-left"></i> Kembali</a>
								<button class="btn btn-primary btn-lg" type="submit" name="simpan" value="t"><i class="fa fa-save"></i> Simpan</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- END Wizards Row -->	
</div>
@endsection
@section('js')
@endsection