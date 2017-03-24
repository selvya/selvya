@extends('layout.master')
@section('content')
<div id="page-content">
	<!-- Wizard Header -->
	<div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1>Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Edit Mapping</h4>
                </div>
            </div>
        </div>
    </div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li><a href="{{url('map-report')}}">Mapping Report</a></li>
		<li>Edit Mapping</li>
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
				<br>
				@include('include.alert')
				<form action="{{url('edit/mapping/proses/'.$map->id)}}" class="form-horizontal" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-10">
							<input type="text" value="{{$map->nama}}" name="nama" class="form-control" placeholder="Nama Mapping">
						</div>
					</div>
					<!-- <div class="form-group">
						<label class="col-sm-2 control-label">Urutan</label>
						<div class="col-sm-10">
							<input type="text" name="urutan" class="form-control" placeholder="Urutan">
						</div>
					</div> -->
					<div class="form-group">
						<label class="col-sm-2 control-label">Group</label>
						<div class="col-sm-10">
							<select name="group" class="form-control">
								<option value="{{$map->group}}">Kantor {{$map->group}}</option>
								<option value="Pusat">Kantor Pusat</option>
								<option value="Regional">Kantor Regional</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" name="edit" class="btn btn-success">Edit</button>
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