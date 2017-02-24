@extends('layout.master')
@section('content')
<div id="page-content">
	<!-- Wizard Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-google_maps"></i>
				Tambah Mapping
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li><a href="{{url('map-report')}}">Mapping Report</a></li>
		<li>Tambah Mapping</li>
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
						<label class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-10">
							<input type="text" name="nama" class="form-control" placeholder="Nama Mapping">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Urutan</label>
						<div class="col-sm-10">
							<input type="text" name="urutan" class="form-control" placeholder="Urutan">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Group</label>
						<div class="col-sm-10">
							<select name="otoritas" class="form-control">
								<option value="Pusat">Kantor Pusat</option>
								<option value="Regional">Kantor Regional</option>
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