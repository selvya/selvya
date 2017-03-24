@extends('layout.master')
@section('content')
<div id="page-content">
	<!-- Wizard Header -->
	<div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1>Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Tambah Budaya Internal</h4>
                </div>
            </div>
        </div>
    </div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li><a href="{{url('budaya-internal')}}">Budaya Internal</a></li>
		<li>Tambah Budaya Internal</li>
	</ul>
	<!-- END Wizard Header -->

	<!-- Wizards Row -->
	<div class="row">
		<div class="col-md-12">
			<div class="block">
				<div class="block-title">
					<h2><strong>Satker</strong></h2>
				</div>
				<div class="container" style="max-width:100%">
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Nama</label>
						<div class="col-md-10">
							<h4>{{$satker->username}}</h4>
						</div>
					</div>
					<!-- <div class="form-group row">
						<label class="col-md-2 col-form-label">Deputi Komisioner</label>
						<div class="col-md-10">
							<h4>{{$satker->deputi_kom}}</h4>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Direktorat</label>
						<div class="col-md-10">
							<h4>{{$satker->direktorat_id}}</h4>
						</div>
					</div> -->
					<div class="form-group row">
						<label class="col-md-2 col-form-label">KOJK</label>
						<div class="col-md-10">
							<h4>{{$satker->kojk}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="block">
				<div class="block-title">
					<h2><strong>Form </strong></h2>
				</div>
				<div class="container" style="max-width:100%">

					@include('include.alert')
					<?php 
					$nama = collect(explode('#', $iku->namaprogram));
					?>
					<form action="{{url('proses-internal/'.$satker->id)}}" method="POST">
						{{csrf_field()}}
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Nama Program</label>
							<div class="col-md-10">
								<h4>{{title_case(str_replace('_',' ',$nama->first()))}}</h4>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Deskripsi Program</label>
							<div class="col-md-10">
								<h4>{{$iku->keterangan}}</h4>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Nilai <span class="text-danger">*</span></label>
							<div class="col-md-10">
								<input type="number" name="" min="0" max="6" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12 text-center">
								<a href="{{url('budaya-internal')}}" class="btn btn-default btn-lg"><i class="fa fa-arrow-left"></i> Kembali</a>
								<button class="btn btn-primary btn-lg" type="submit" name="simpan" value="t"><i class="fa fa-save"></i> Simpan</button>
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
@endsection