@extends('layout.master')
@section('content')
<div id="page-content">
	<!-- Wizard Header -->
	<div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1>Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Tambah Mapping {{$map->nama}} </h4>
                </div>
            </div>
        </div>
    </div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li><a href="{{url('map-report')}}">Mapping Report</a></li>
		<li><a href="{{url('mapping-detail/'.$map->id)}}">{{$map->nama}}</a></li>
		<li>Tambah Satker {{$map->nama}}</li>
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
				<form action="" class="form-horizontal" method="POST">
				{{csrf_field()}}
					<div class="form-group">
						<label class="col-sm-2 control-label">Satuan Kerja</label>
						<div class="col-sm-10">
							<select name="satker" class="form-control">
							@foreach($user as $satker)
								@if($satker->nm_deputi_komisioner !== '' || $satker->nm_deputi_direktur !== '' ||  $satker->nm_deputi_direktur == $satker->nm_unit_kerja)
								<option value="{{$satker->id}}">{{$satker->username}} :: {{$satker->nm_unit_kerja}} // {{$satker->nm_deputi_direktur}}</option>
								@else
								<option value="{{$satker->id}}">{{$satker->username}} :: {{$satker->nm_unit_kerja}} // {{$satker->nm_deputi_komisioner}}</option>
								@endif
							@endforeach
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