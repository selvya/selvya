@extends('layout.master')
@section('css')
<style type="text/css">
	th{text-align: center;}
</style>
@endsection
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-tags"></i>
				<b>Tambah Budaya Eksternal</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li><a href="{{url('budaya-eksternal')}}">Budaya Eksternal</a></li>
		<li>Tambah Budaya Eksternal</li>
	</ul>

	<div class="block full" style="overflow: hidden;">
		<form action="" method="POST">
			<div class="form-group">
				<label class="col-md-3 control-label">Nama Program </label>
				<div class="col-md-9">
					<h4>Programnya</h4>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Tujuan </label>
				<div class="col-md-9">
					<h4>Tujuan programnya</h4>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Lampiran Berkas <span class="text-danger">*</span></label>
				<div class="col-md-9">
					<input type="file" name="file" class="form-control" >
				</div>
			</div>
			<br>
			<div class="form-group">
				<label class="col-md-3 control-label">Alat Ukur <span class="text-danger">*</span></label>
				<div class="col-md-9">
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Nilai <span class="text-danger">*</span></label>
				<div class="col-md-9">
					<input type="range" min="0" max="6" value="0" step="0.01" id="fader" oninput="outputUpdate(value)" class="form-control">
					<output for="fader" id="volume">0</output>
				</div>
			</div>
			<div class="form-group">
				<div class="pull-right">
					<button class="btn btn-success">Tambah</button>
				</div>
			</div>
		</form>
	</div>
	<!-- END Page Content -->
	@endsection
	@section('js')
	<script type="text/javascript">
		function outputUpdate(vol) {
			document.querySelector('#volume').value = vol;
		}

	</script>
	@endsection
