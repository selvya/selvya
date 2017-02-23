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
			<!-- Wizard with Validation Block -->
			<div class="block">
				<!-- Wizard with Validation Title -->
				<div class="block-title">
					<h2><strong>Validation</strong> Wizard</h2>
				</div>
				<!-- END Wizard with Validation Title -->

				<!-- Wizard with Validation Content -->
				<form id="advanced-wizard" action="page_forms_wizard.html" method="post" class="form-horizontal form-bordered">
					<!-- First Step -->
					<div id="advanced-first" class="step">
						<!-- Step Info -->
						<div class="wizard-steps">
							<div class="row">
								<div class="col-xs-6 active">
									<span>1. Account</span>
								</div>
								<div class="col-xs-6">
									<span>2. Info</span>
								</div>
							</div>
						</div>
						<!-- END Step Info -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="val_username">Username <span class="text-danger">*</span></label>
							<div class="col-md-6">
								<div class="input-group">
									<input type="text" id="val_username" name="val_username" class="form-control" placeholder="Your username.." required>
									<span class="input-group-addon"><i class="gi gi-user"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="val_email">Email <span class="text-danger">*</span></label>
							<div class="col-md-6">
								<div class="input-group">
									<input type="text" id="val_email" name="val_email" class="form-control" placeholder="test@example.com" required>
									<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="val_password">Password <span class="text-danger">*</span></label>
							<div class="col-md-6">
								<div class="input-group">
									<input type="password" id="val_password" name="val_password" class="form-control" placeholder="Choose a crazy one.." required>
									<span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="val_confirm_password">Retype Password <span class="text-danger">*</span></label>
							<div class="col-md-6">
								<div class="input-group">
									<input type="password" id="val_confirm_password" name="val_confirm_password" class="form-control" placeholder="..and confirm it!" required>
									<span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
								</div>
							</div>
						</div>
					</div>
					<!-- END First Step -->

					<!-- Second Step -->
					<div id="advanced-second" class="step">
						<!-- Step Info -->
						<div class="wizard-steps">
							<div class="row">
								<div class="col-xs-6 done">
									<span>1. Account</span>
								</div>
								<div class="col-xs-6 active">
									<span>2. Info</span>
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
@endsection