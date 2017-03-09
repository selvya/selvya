@extends('layout.master')
@section('content')
<div id="page-content">
	<!-- Wizard Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="fa fa-magic"></i>
				Tambah OJK Inovatif
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li><a href="{{url('inovatif')}}">OJK Inovatif</a></li>
		<li>Tambah OJK Inovatif</li>
	</ul>
	<!-- END Wizard Header -->

	<!-- Wizards Row -->
	<div class="row">
		<div class="col-md-12">
			<div class="block">
				<div class="block-title">
					<h2><strong>Form</strong></h2>
				</div>
				<div class="container" style="max-width: 1000px;">
					<form>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Nama Program</label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Deskripsi Program</label>
							<div class="col-md-10">
								<textarea class="form-control" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Tujuan Program</label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Alat Ukur</label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="" placeholder="Alat Ukur I">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-10 pull-right">
								<table class="table table-condensed table-hover table-stripped">
									<tr>
										<th class="text-center">Nama</th>
										<th class="text-center">Triwulan I</th>
										<th class="text-center">Triwulan II</th>
										<th class="text-center">Triwulan III</th>
										<th class="text-center">Triwulan IV</th>
									</tr>
									<tr>
										<td>Nilai</td>
										<td><input placeholder="Assessment 1" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 1" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 1" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 1" type="text" name="" class="form-control"></td>
									</tr>
									<tr>
										<td>Nilai</td>
										<td><input placeholder="Assessment 2" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 2" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 2" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 2" type="text" name="" class="form-control"></td>
									</tr>
									<tr>
										<td>Nilai</td>
										<td><input placeholder="Assessment 3" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 3" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 3" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 3" type="text" name="" class="form-control"></td>
									</tr>
									<tr>
										<td>Nilai</td>
										<td><input placeholder="Assessment 4" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 4" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 4" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 4" type="text" name="" class="form-control"></td>
									</tr>
									<tr>
										<td>Nilai</td>
										<td><input placeholder="Assessment 5" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 5" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 5" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 5" type="text" name="" class="form-control"></td>
									</tr>
									<tr>
										<td>Nilai</td>
										<td><input placeholder="Assessment 6" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 6" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 6" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 6" type="text" name="" class="form-control"></td>
									</tr>
								</table>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-2 col-form-label">Alat Ukur</label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="" placeholder="Alat Ukur II">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-10 pull-right">
								<table class="table table-condensed table-hover table-stripped">
									<tr>
										<th class="text-center">Nama</th>
										<th class="text-center">Triwulan I</th>
										<th class="text-center">Triwulan II</th>
										<th class="text-center">Triwulan III</th>
										<th class="text-center">Triwulan IV</th>
									</tr>
									<tr>
										<td>Nilai</td>
										<td><input placeholder="Assessment 1" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 1" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 1" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 1" type="text" name="" class="form-control"></td>
									</tr>
									<tr>
										<td>Nilai</td>
										<td><input placeholder="Assessment 2" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 2" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 2" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 2" type="text" name="" class="form-control"></td>
									</tr>
									<tr>
										<td>Nilai</td>
										<td><input placeholder="Assessment 3" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 3" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 3" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 3" type="text" name="" class="form-control"></td>
									</tr>
									<tr>
										<td>Nilai</td>
										<td><input placeholder="Assessment 4" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 4" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 4" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 4" type="text" name="" class="form-control"></td>
									</tr>
									<tr>
										<td>Nilai</td>
										<td><input placeholder="Assessment 5" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 5" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 5" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 5" type="text" name="" class="form-control"></td>
									</tr>
									<tr>
										<td>Nilai</td>
										<td><input placeholder="Assessment 6" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 6" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 6" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 6" type="text" name="" class="form-control"></td>
									</tr>
								</table>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-2 col-form-label">Alat Ukur</label>
							<div class="col-md-10">
								<input class="form-control" type="text" id="" placeholder="Alat Ukur III">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-10 pull-right">
								<table class="table table-condensed table-hover table-stripped">
									<tr>
										<th class="text-center">Nama</th>
										<th class="text-center">Triwulan I</th>
										<th class="text-center">Triwulan II</th>
										<th class="text-center">Triwulan III</th>
										<th class="text-center">Triwulan IV</th>
									</tr>
									<tr>
										<td>Nilai</td>
										<td><input placeholder="Assessment 1" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 1" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 1" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 1" type="text" name="" class="form-control"></td>
									</tr>
									<tr>
										<td>Nilai</td>
										<td><input placeholder="Assessment 2" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 2" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 2" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 2" type="text" name="" class="form-control"></td>
									</tr>
									<tr>
										<td>Nilai</td>
										<td><input placeholder="Assessment 3" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 3" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 3" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 3" type="text" name="" class="form-control"></td>
									</tr>
									<tr>
										<td>Nilai</td>
										<td><input placeholder="Assessment 4" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 4" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 4" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 4" type="text" name="" class="form-control"></td>
									</tr>
									<tr>
										<td>Nilai</td>
										<td><input placeholder="Assessment 5" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 5" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 5" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 5" type="text" name="" class="form-control"></td>
									</tr>
									<tr>
										<td>Nilai</td>
										<td><input placeholder="Assessment 6" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 6" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 6" type="text" name="" class="form-control"></td>
										<td><input placeholder="Assessment 6" type="text" name="" class="form-control"></td>
									</tr>
								</table>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-10 pull-right">
								<button class="btn btn-success btn-block">Simpan</button>
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
<script src="{{asset('vendor/js/pages/formsWizard.js')}}"></script>
<script>$(function(){ FormsWizard.init(); });</script>
@endsection