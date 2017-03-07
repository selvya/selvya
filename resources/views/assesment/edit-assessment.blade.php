@extends('layout.master')
@section('content')
<style type="text/css">
	.table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td, .table tbody + tbody, .table-bordered, .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td{
		border:none;
	}
</style>
<div id="page-content">
	<!-- Wizard Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="fa fa-magic"></i>
				Edit Self Assessment
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li><a href="{{url('inovatif')}}">Self Assessment</a></li>
		<li>Edit Self Assessment</li>
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
				<!-- END Wizard with Validation Title -->

				<!-- Wizard with Validation Content -->
				<form id="advanced-wizard" action="page_forms_wizard.html" method="post" class="form-horizontal form-bordered">
					<!-- First Step -->
					<div id="clickable-first" class="step">

						<div class="form-group">
							<div class="col-xs-12">
								<ul class="nav nav-pills nav-justified clickable-steps">
									<li class="active">
										<a href="javascript:void(0)" data-gotostep="clickable-first">
											<strong>1. Program Budaya Spesifik <big>40%</big></strong>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-second"><strong>
											2. Serapan Anggaran <big>15%</big></strong>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-third">
											<strong>3. Partisipan Pimpinan <big>30%</big></strong>
										</a>
									</li>

									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-fourth">
											<strong>4. Kecepatan Pelaporan <big>15%</big></strong>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<br>
						<!-- ACCORDION -->
						<div class="container" style="max-width: 1000px; overflow: hidden;">
							<!-- MYSTERY CALL -->
							<div class="block">
								<div class="block-title">
									<div class="block-options pull-right">
										<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content">
											<i class="fa fa-arrows-v"></i>
										</a>
									</div>
									<h2><strong>MYSTERY CALL</strong></h2>
								</div>
								<div class="block-content">
									<div class="form-group">
										<label class="col-md-3 control-label">Indikator Penilaian <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<h4>50</h4>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Nilai <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<h4>50</h4>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Lampiran Berkas <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<input type="file" name="file" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Kontak Stakeholder <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<table class="table">
												<tr id="field1">
													<td>
														<input type="text" class="form-control" placeholder="Nama">
													</td>
													<td><input type="email" class="form-control" placeholder="Email"></td>
													<td><input type="text" class="form-control" placeholder="Instansi"></td>
													<td><input type="text" class="form-control" placeholder="No Telp"></td>
													<td><a onclick="tambah_MC()" data-toggle="tooltip" title="Tambah Stakeholder" class="btn btn-success"><i class="fa fa-plus"></i></a></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!-- CLOSE MYSTERY CALL -->

							<!-- SURVEY STAKEHOLDER -->
							<div class="block">
								<div class="block-title">
									<div class="block-options pull-right">
										<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content">
											<i class="fa fa-arrows-v"></i>
										</a>
									</div>
									<h2><strong>SURVEY STAKEHOLDER</strong></h2>
								</div>
								<div class="block-content" style="display: none;">
									<div class="form-group">
										<label class="col-md-3 control-label">Indikator Penilaian <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<h4>50</h4>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Nilai <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<h4>50</h4>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Lampiran Berkas <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<input type="file" name="file" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Kontak Stakeholder <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<table class="table">
												<tr id="field2">
													<td>
														<input type="text" class="form-control" placeholder="Nama">
													</td>
													<td><input type="email" class="form-control" placeholder="Email"></td>
													<td><input type="text" class="form-control" placeholder="Instansi"></td>
													<td><input type="text" class="form-control" placeholder="No Telp"></td>
													<td><a onclick="tambah_SS()" data-toggle="tooltip" title="Tambah Stakeholder" class="btn btn-success"><i class="fa fa-plus"></i></a></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!-- CLOSE SURVEY STAKEHOLDER -->

							<!-- OJK PEDULI -->
							<div class="block">
								<div class="block-title">
									<div class="block-options pull-right">
										<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content">
											<i class="fa fa-arrows-v"></i>
										</a>
									</div>
									<h2><strong>OJK PEDULI</strong></h2>
								</div>
								<div class="block-content" style="display: none;">
									<div class="form-group">
										<label class="col-md-3 control-label">Indikator Penilaian <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<h4>50</h4>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Nilai <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<h4>50</h4>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Lampiran Berkas <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<input type="file" name="file" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Kontak Stakeholder <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<table class="table">
												<tr id="field3">
													<td>
														<input type="text" class="form-control" placeholder="Nama">
													</td>
													<td><input type="email" class="form-control" placeholder="Email"></td>
													<td><input type="text" class="form-control" placeholder="Instansi"></td>
													<td><input type="text" class="form-control" placeholder="No Telp"></td>
													<td><a onclick="tambah_OP()" data-toggle="tooltip" title="Tambah Stakeholder" class="btn btn-success"><i class="fa fa-plus"></i></a></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!-- CLOSE OJK PEDULI -->

							<!-- OJK INOVATIF -->
							<div class="block">
								<div class="block-title">
									<div class="block-options pull-right">
										<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content">
											<i class="fa fa-arrows-v"></i>
										</a>
									</div>
									<h2><strong>OJK INOVATIF</strong></h2>
								</div>
								<div class="block-content" style="display: none;">
									<div class="form-group">
										<label class="col-md-3 control-label" for="val_username">Nama Program <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<input type="text" class="form-control" placeholder="Nama Program" required>	
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="val_username">Tujuan Program <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<input type="text" class="form-control" placeholder="Tujuan Program" required>	
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="val_username">Deskripsi Program <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<input type="text" class="form-control" placeholder="Deskripsi Program" required>	
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="val_username">Alat Ukur <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<input type="text" class="form-control" placeholder="Alat Ukur" required>	
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="val_username">Nilai <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<input type="text" class="form-control" placeholder="Niali" required>	
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="val_username">Lampiran Berkas <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<input type="file" class="form-control" required>	
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Kontak Stakeholder <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<table class="table">
												<tr id="field4">
													<td>
														<input type="text" class="form-control" placeholder="Nama">
													</td>
													<td><input type="email" class="form-control" placeholder="Email"></td>
													<td><input type="text" class="form-control" placeholder="Instansi"></td>
													<td><input type="text" class="form-control" placeholder="No Telp"></td>
													<td><a onclick="tambah_INO()" data-toggle="tooltip" title="Tambah Stakeholder" class="btn btn-success"><i class="fa fa-plus"></i></a></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!-- CLOSE OJK INOVATIF -->
						</div>
						<!-- CLOSE CONTAINER -->
						<!-- CLOSE ACCORDION -->
					</div>
					<!-- END First Step -->

					<!-- Second Step -->
					<div id="clickable-second" class="step" style="overflow: hidden;">

						<div class="form-group">
							<div class="col-xs-12">
								<ul class="nav nav-pills nav-justified clickable-steps">
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-first">
											<strong><i class="fa fa-check"></i> 1. Program Budaya Spesifik <big>40%</big></strong>
										</a>
									</li>
									<li class="active">
										<a href="javascript:void(0)" data-gotostep="clickable-second"><strong>
											2. Serapan Anggaran <big>15%</big></strong>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-third">
											<strong>3. Partisipan Pimpinan <big>30%</big></strong>
										</a>
									</li>

									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-fourth">
											<strong>4. Kecepatan Pelaporan <big>15%</big></strong>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<br>
						<div class="container" style="max-width: 1000px; overflow: hidden;">
							<div class="block">
								<table class="table table-striped table-bordered">
									<tbody>
										<tr>
											<td>&nbsp;</td>
											<td>Triwulan I</td>
											<td>Triwulan II</td>
											<td>Triwulan III</td>
											<td>Triwulan IV</td>
										</tr>
										<tr>
											<td>Rencana Anggaran</td>
											<td>Rp. 20.000.000</td>
											<td>Rp. 20.000.000</td>
											<td>Rp. 30.000.000</td>
											<td>Rp. 30.000.000</td>
										</tr>
										<tr>
											<td>Realisasi Anggaran</td>
											<td>
												<input class="form-control numVal" name="real1" id="real1" type="text" maxlength="14" placeholder="Realisasi Anggaran" value="">
												<input type="hidden" name="realizeq1" id="realizeq1" value="0">
											</td>
											<td>
												<input class="form-control" name="real2" id="real2" type="text" maxlength="14" value="Rp. 0" disabled="">
												<input type="hidden" name="realizeq2" id="realizeq2" value="0">
											</td>
											<td>
												<input class="form-control" name="real3" id="real3" type="text" maxlength="14" value="Rp. 0" disabled="">
												<input type="hidden" name="realizeq3" id="realizeq3" value="0">
											</td>
											<td>
												<input class="form-control" name="real4" id="real4" type="text" maxlength="14" value="Rp. 0" disabled="">
												<input type="hidden" name="realizeq4" id="realizeq4" value="0">
											</td>
										</tr>
										<tr>
											<td><label for="exampleInputFile">Lampiran<br>(Max. 20MB)<br>(.zip,.rar, .pdf, .jpg)</label></td>
											<td><input class="form-control" type="file" id="exampleInputFile1" name="userfile1" onchange="AlertFilesize(document.getElementById('exampleInputFile1').getAttribute('id'),1)"></td>
											<td>Belum ada Lampiran</td>
											<td>Belum ada Lampiran</td>
											<td>Belum ada Lampiran</td>
										</tr>
									</tbody>
								</table>
								<input type="hidden" name="pagu" id="pagu" value="100000000">
								<input type="hidden" name="total" id="totalAnnual" value="0">
							</div>
						</div>
					</div>
					<!-- END Second Step -->

					<!-- Third Step -->
					<div id="clickable-third" class="step">

						<div class="form-group">
							<div class="col-xs-12">
								<ul class="nav nav-pills nav-justified clickable-steps">
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-first">
											<strong><i class="fa fa-check"></i>1. Program Budaya Spesifik <big>40%</big></strong>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-second"><strong>
											<i class="fa fa-check"></i> 2. Serapan Anggaran <big>15%</big></strong>
										</a>
									</li>
									<li class="active">
										<a href="javascript:void(0)" data-gotostep="clickable-third">
											<strong>3. Partisipan Pimpinan <big>30%</big></strong>
										</a>
									</li>

									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-fourth">
											<strong>4. Kecepatan Pelaporan <big>15%</big></strong>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<br>
						<div class="container" style="max-width: 1000px; overflow: hidden;">
							<div class="block">
								<div class="block-content">
									<div class="form-group">
										<label class="col-md-3 control-label">Nama Program <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Peran Pimpinan <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<textarea class="form-control" rows="5"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Partisipasi Pimpinan <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<input type="number" class="form-control" min="0" max="10">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Lampiran Berkas <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<input type="file" class="form-control">
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<!-- END Third Step -->

					<!-- Fourth Step -->
					<div id="clickable-fourth" class="step">

						<div class="form-group">
							<div class="col-xs-12">
								<ul class="nav nav-pills nav-justified clickable-steps">
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-first">
											<strong><i class="fa fa-check"></i>1. Program Budaya Spesifik <big>40%</big></strong>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-second"><strong>
											<i class="fa fa-check"></i> 2. Serapan Anggaran <big>15%</big></strong>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-third">
											<strong> <i class="fa fa-check"></i> 3. Partisipan Pimpinan <big>30%</big></strong>
										</a>
									</li>

									<li class="active">
										<a href="javascript:void(0)" data-gotostep="clickable-fourth">
											<strong>4. Kecepatan Pelaporan <big>15%</big></strong>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<br>
						<div class="container" style="max-width: 1000px; overflow: hidden;">
							<div class="block">
								<div class="block-content">
									<div class="form-group">
										<label class="col-md-3 control-label">Nama Program <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Penjelasan Nilai <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<textarea class="form-control" rows="5"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Nilai <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<input type="number" class="form-control" min="0">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Lampiran Berkas <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<input type="file" class="form-control">
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
					<!-- END Fourth Step -->

					<!-- Form Buttons -->
					<div class="form-group form-actions">
						<div class="col-md-8 col-md-offset-4">
							<input type="reset" class="btn btn-sm btn-warning" id="back2" value="Back">
							<input type="submit" class="btn btn-sm btn-primary" id="next2" value="Next">
						</div>
					</div>
					<!-- END Form Buttons -->
				</form>
				<!-- END Wizard with Validation Content -->
			</div>
			<!-- END Wizard with Validation Block -->
		</div>
	</div>
	<!-- END Wizards Row -->	
</div>
@endsection
@section('js')
<script src="{{asset('vendor/js/pages/formsWizard.js')}}"></script>
<script>$(function(){ FormsWizard.init(); });</script>
<script type="text/javascript">
	function tambah_MC(){
		$('<tr id="baru">'+
			'<td style="text-align:center;">'+
			'<input type="text" placeholder="Nama" class="form-control">'+
			'</td>'+
			'<td>'+
			'<input type="email" placeholder="Email" class="form-control">'+
			'<td>'+
			'<input type="text" placeholder="Instansi" class="form-control">'+
			'</td>'+
			'<td>'+
			'<input type="text" placeholder="No Telp" class="form-control">'+
			'</td>'+
			'<td>'+
			'<a data-toggle="tooltip" title="Hapus Field" class="remove_field btn btn-danger"><i class="fa fa-trash-o"></i></a>'+
			'</td>'+
			'</tr>').insertAfter('#field1');
		$(".remove_field").click(function(){
			$(this).closest("tr").remove();
		});
	}

	function tambah_SS(){
		$('<tr id="baru">'+
			'<td style="text-align:center;">'+
			'<input type="text" placeholder="Nama" class="form-control">'+
			'</td>'+
			'<td>'+
			'<input type="email" placeholder="Email" class="form-control">'+
			'<td>'+
			'<input type="text" placeholder="Instansi" class="form-control">'+
			'</td>'+
			'<td>'+
			'<input type="text" placeholder="No Telp" class="form-control">'+
			'</td>'+
			'<td>'+
			'<a data-toggle="tooltip" title="Hapus Field" class="remove_field btn btn-danger"><i class="fa fa-trash-o"></i></a>'+
			'</td>'+
			'</tr>').insertAfter('#field2');
		$(".remove_field").click(function(){
			$(this).closest("tr").remove();
		});
	}

	function tambah_OP(){
		$('<tr id="baru">'+
			'<td style="text-align:center;">'+
			'<input type="text" placeholder="Nama" class="form-control">'+
			'</td>'+
			'<td>'+
			'<input type="email" placeholder="Email" class="form-control">'+
			'<td>'+
			'<input type="text" placeholder="Instansi" class="form-control">'+
			'</td>'+
			'<td>'+
			'<input type="text" placeholder="No Telp" class="form-control">'+
			'</td>'+
			'<td>'+
			'<a data-toggle="tooltip" title="Hapus Field" class="remove_field btn btn-danger"><i class="fa fa-trash-o"></i></a>'+
			'</td>'+
			'</tr>').insertAfter('#field3');
		$(".remove_field").click(function(){
			$(this).closest("tr").remove();
		});
	}

	function tambah_INO(){
		$('<tr id="baru">'+
			'<td style="text-align:center;">'+
			'<input type="text" placeholder="Nama" class="form-control">'+
			'</td>'+
			'<td>'+
			'<input type="email" placeholder="Email" class="form-control">'+
			'<td>'+
			'<input type="text" placeholder="Instansi" class="form-control">'+
			'</td>'+
			'<td>'+
			'<input type="text" placeholder="No Telp" class="form-control">'+
			'</td>'+
			'<td>'+
			'<a data-toggle="tooltip" title="Hapus Field" class="remove_field btn btn-danger"><i class="fa fa-trash-o"></i></a>'+
			'</td>'+
			'</tr>').insertAfter('#field4');
		$(".remove_field").click(function(){
			$(this).closest("tr").remove();
		});
	}


</script>
@endsection