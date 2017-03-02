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
					<div id="advanced-first" class="step">
						<!-- Step Info -->
						<div class="wizard-steps">
							<div class="row">
								<div class="col-xs-3 active" data-toggle="tooltip" title="Program Budaya Spesifik">
									<span>
										PBS 40%
									</span>
								</div>
								<div class="col-xs-3" data-toggle="tooltip" title="Serapan Anggaran">
									<span>SA 15%</span>
								</div>
								<div class="col-xs-3" data-toggle="tooltip" title="Partisipan Pimpinan">
									<span>PP 30%</span>
								</div>
								<div class="col-xs-3" data-toggle="tooltip" title="Kecepatan Pelaporan">
									<span>KP 15%</span>
								</div>
							</div>
						</div>
						<!-- END Step Info -->
						
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
					<div id="advanced-second" class="step">
						<!-- Step Info -->
						<div class="wizard-steps">
							<div class="row">
								<div class="col-xs-3 done" data-toggle="tooltip" title="Program Budaya Spesifik">
									<span>
										PBS 40%
									</span>
								</div>
								<div class="col-xs-3 active" data-toggle="tooltip" title="Serapan Anggaran">
									<span>SA 15%</span>
								</div>
								<div class="col-xs-3" data-toggle="tooltip" title="Partisipan Pimpinan">
									<span>PP 30%</span>
								</div>
								<div class="col-xs-3" data-toggle="tooltip" title="Kecepatan Pelaporan">
									<span>KP 15%</span>
								</div>
							</div>
						</div>
						<!-- END Step Info -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="example-advanced-bio">Bio</label>
							<div class="col-md-8">
								<textarea id="example-advanced-bio" name="example-advanced-bio" rows="6" class="form-control" placeholder="Tell us your story.."></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="example-advanced-newsletter">Newsletter</label>
							<div class="col-md-6">
								<div class="checkbox">
									<label for="example-advanced-newsletter">
										<input type="checkbox" id="example-advanced-newsletter" name="example-advanced-newsletter">  Sign up
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label"><a href="#modal-terms" data-toggle="modal">Terms</a> <span class="text-danger">*</span></label>
							<div class="col-md-6">
								<label class="switch switch-primary" for="val_terms">
									<input type="checkbox" id="val_terms" name="val_terms" value="1">
									<span data-toggle="tooltip" title="I agree to the terms!"></span>
								</label>
							</div>
						</div>
					</div>
					<!-- END Second Step -->

					<!-- Third Step -->
					<div id="advanced-third" class="step">
						<!-- Step Info -->
						<div class="wizard-steps">
							<div class="row">
								<div class="col-xs-3 done" data-toggle="tooltip" title="Program Budaya Spesifik">
									<span>
										PBS 40%
									</span>
								</div>
								<div class="col-xs-3 done" data-toggle="tooltip" title="Serapan Anggaran">
									<span>SA 15%</span>
								</div>
								<div class="col-xs-3 active" data-toggle="tooltip" title="Partisipan Pimpinan">
									<span>PP 30%</span>
								</div>
								<div class="col-xs-3" data-toggle="tooltip" title="Kecepatan Pelaporan">
									<span>KP 15%</span>
								</div>
							</div>
						</div>
						<!-- END Step Info -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="example-advanced-bio">Bio</label>
							<div class="col-md-8">
								<textarea id="example-advanced-bio" name="example-advanced-bio" rows="6" class="form-control" placeholder="Tell us your story.."></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="example-advanced-newsletter">Newsletter</label>
							<div class="col-md-6">
								<div class="checkbox">
									<label for="example-advanced-newsletter">
										<input type="checkbox" id="example-advanced-newsletter" name="example-advanced-newsletter">  Sign up
									</label>
								</div>
							</div>
						</div>
					</div>
					<!-- END Third Step -->

					<!-- Fourth Step -->
					<div id="advanced-fourth" class="step">
						<!-- Step Info -->
						<div class="wizard-steps">
							<div class="row">
								<div class="col-xs-3 done" data-toggle="tooltip" title="Program Budaya Spesifik">
									<span>
										PBS 40%
									</span>
								</div>
								<div class="col-xs-3 done" data-toggle="tooltip" title="Serapan Anggaran">
									<span>SA 15%</span>
								</div>
								<div class="col-xs-3 done" data-toggle="tooltip" title="Partisipan Pimpinan">
									<span>PP 30%</span>
								</div>
								<div class="col-xs-3 active" data-toggle="tooltip" title="Kecepatan Pelaporan">
									<span>KP 15%</span>
								</div>
							</div>
						</div>
						<!-- END Step Info -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="example-advanced-bio">Bio</label>
							<div class="col-md-8">
								<textarea id="example-advanced-bio" name="example-advanced-bio" rows="6" class="form-control" placeholder="Tell us your story.."></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="example-advanced-newsletter">Newsletter</label>
							<div class="col-md-6">
								<div class="checkbox">
									<label for="example-advanced-newsletter">
										<input type="checkbox" id="example-advanced-newsletter" name="example-advanced-newsletter">  Sign up
									</label>
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