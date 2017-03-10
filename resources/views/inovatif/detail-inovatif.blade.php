@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-sort"></i>
				<b>Arsip Inovatif</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li><a href="{{url('inovatif')}}">OJK Inovatif</a></li>
		<li>Detail</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<form role="form" method="post" enctype="multipart/form-data" action="#">
			<div class="form-group">
				<label for="disabledSelect">Nama Program</label>
				<input class="form-control" name="nama_program" type="text" value="DSMS Inovatif Oke!" disabled>
			</div>
			<div class="form-group">
				<label for="disabledSelect">Tujuan Program</label>
				<input class="form-control" name="also_known_as" type="text" value="kf kafjklkfjkal" disabled>
			</div>
			<div class="form-group">
				<label for="disabledSelect">Deskripsi Program</label>
				<input class="form-control" name="deskripsi_monitoring" type="text" value="l agmklamglrmgl" disabled>
			</div>
			<div class="form-group">
				<label for="disabledSelect"><b><u>Alat Ukur:</u></b></label>
			</div>
			<div class="form-group">
				<center>
					<input class="form-control" name="ukur1" type="text" placeholder="Nama Alat Ukur I" value="Berat Badan" disabled>
				</center><br>
				<table class="table table-striped table-bordered table-hover">
					<tr>
						<td>&nbsp;</td>
						<td>Triwulan I</td>
						<td>Triwulan II</td>
						<td>Triwulan III</td>
						<td>Triwulan IV</td>
					</tr>
					<tr>
						<td>Nilai Self Assessment 6</td>
						<td><input class="form-control" name="1_self_assessment_6_Q1" type="text" placeholder="Definisi Nilai" value="-5 kg" disabled></td>
						<td><input class="form-control" name="1_self_assessment_6_Q2" type="text" placeholder="Definisi Nilai" value="-5" disabled></td>
						<td><input class="form-control" name="1_self_assessment_6_Q3" type="text" placeholder="Definisi Nilai" value="-10" disabled></td>
						<td><input class="form-control" name="1_self_assessment_6_Q4" type="text" placeholder="Definisi Nilai" value="-15" disabled></td>
					</tr>
					<tr>
						<td>Nilai Self Assessment 5</td>
						<td><input class="form-control" name="1_self_assessment_5_Q1" type="text" placeholder="Definisi Nilai" value="-4 kg" disabled></td>
						<td><input class="form-control" name="1_self_assessment_5_Q2" type="text" placeholder="Definisi Nilai" value="-4" disabled></td>
						<td><input class="form-control" name="1_self_assessment_5_Q3" type="text" placeholder="Definisi Nilai" value="-8" disabled></td>
						<td><input class="form-control" name="1_self_assessment_5_Q4" type="text" placeholder="Definisi Nilai" value="-13" disabled></td>
					</tr>
					<tr>
						<td>Nilai Self Assessment 4</td>
						<td><input class="form-control" name="1_self_assessment_4_Q1" type="text" placeholder="Definisi Nilai" value="-3 kg" disabled></td>
						<td><input class="form-control" name="1_self_assessment_4_Q2" type="text" placeholder="Definisi Nilai" value="-3" disabled></td>
						<td><input class="form-control" name="1_self_assessment_4_Q3" type="text" placeholder="Definisi Nilai" value="-5" disabled></td>
						<td><input class="form-control" name="1_self_assessment_4_Q4" type="text" placeholder="Definisi Nilai" value="-11" disabled></td>
					</tr>
					<tr>
						<td>Nilai Self Assessment 3</td>
						<td><input class="form-control" name="1_self_assessment_3_Q1" type="text" placeholder="Definisi Nilai" value="-2 kg" disabled></td>
						<td><input class="form-control" name="1_self_assessment_3_Q2" type="text" placeholder="Definisi Nilai" value="-2" disabled></td>
						<td><input class="form-control" name="1_self_assessment_3_Q3" type="text" placeholder="Definisi Nilai" value="-3" disabled></td>
						<td><input class="form-control" name="1_self_assessment_3_Q4" type="text" placeholder="Definisi Nilai" value="-9" disabled></td>
					</tr>
					<tr>
						<td>Nilai Self Assessment 2</td>
						<td><input class="form-control" name="1_self_assessment_2_Q1" type="text" placeholder="Definisi Nilai" value="-1 kg" disabled></td>
						<td><input class="form-control" name="1_self_assessment_2_Q2" type="text" placeholder="Definisi Nilai" value="-1" disabled></td>
						<td><input class="form-control" name="1_self_assessment_2_Q3" type="text" placeholder="Definisi Nilai" value="-2" disabled></td>
						<td><input class="form-control" name="1_self_assessment_2_Q4" type="text" placeholder="Definisi Nilai" value="-7" disabled></td>
					</tr>
					<tr>
						<td>Nilai Self Assessment 1</td>
						<td><input class="form-control" name="1_self_assessment_1_Q1" type="text" placeholder="Definisi Nilai" value="0" disabled></td>
						<td><input class="form-control" name="1_self_assessment_1_Q2" type="text" placeholder="Definisi Nilai" value="0" disabled></td>
						<td><input class="form-control" name="1_self_assessment_1_Q3" type="text" placeholder="Definisi Nilai" value="-1" disabled></td>
						<td><input class="form-control" name="1_self_assessment_1_Q4" type="text" placeholder="Definisi Nilai" value="-5" disabled></td>
					</tr>
				</table>
			</div>
			<div style="display: block; margin-top: 10px;">
				<a href="{{url('inovatif')}}" class="btn btn-default">Kembali <i class="fa fa-arrow-circle-o-left"></i></a>
			</div>
			<input type="hidden" name="rdsd_id" value="3" >
			<input type="hidden" name="whatnow" id="whatnow" value="next">
		</form>
	</div>
	<!-- END Page Content -->
	<!-- END Page Content -->
	@endsection
	@section('js')
	<script src="{{asset('vendor/js/pages/tablesDatatables.js')}}"></script>
	<script>$(function(){ TablesDatatables.init(); });</script>
	@endsection