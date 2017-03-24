@extends('layout.master')
@section('content')
<div id="page-content">
	<!-- Wizard Header -->
	 <div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1 style="text-transform: uppercase">Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Tambah Departemen</h4>
                </div>
            </div>
        </div>
    </div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li><a href="{{url('departemen')}}">Deputi Departemen</a></li>
		<li>Tambah Departemen</li>
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
				<form class="form-horizontal" action="{{url('departemen/tambah/proses')}}" method="POST">
					<div class="form-group">
						<label class="col-sm-2 control-label">Departemen</label>
						<div class="col-sm-10">
							{{csrf_field()}}
							<input type="text" class="form-control" name="departemen" placeholder="Departemen" required>
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