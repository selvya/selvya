@extends('layout.master')
@section('content')
<div id="page-content">
	<!-- Wizard Header -->
	<div class="content-header content-media">
		<div class="header-section">
			<div class="jumbotron" >
				<div class="col-md-12">
					<h1>Salam <b>Perubahan</b></h1>
					<h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Tambah Lomba Kreasi Kreatif</h4>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li><a href="{{url('inovatif')}}">Masukan Kreasi Kreatif</a></li>
		<li>Masukan Lomba Kreasi Kreatif</li>
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
						<label class="col-md-2 col-form-label">Deputi Komisioner</label>
						<div class="col-md-10">
							<h4>{{$satker->nm_deputi_komisioner}}</h4>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">KOJK</label>
						<div class="col-md-10">
							<h4>{{$satker->nm_deputi_direktur}}</h4>
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
					$nama   = collect(explode('#', $iku->namaprogram));
					$isinya =  \App\SelfAssesment::where('tahun',date('Y'))->where('triwulan',$triwulan['current']['triwulan'])->where('iku_id',$iku->id)->where('user_id',$satker->id)->first();
					// dd($isinya);
					?>
					<form action="{{url('proses-lomba/'.$satker->id)}}" method="POST">
						{{csrf_field()}}
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Nama Program</label>
							<div class="col-md-10">
								<input type="text" name="namaprogram" class="form-control" placeholder="{{title_case(str_replace('_',' ',$nama->first()))}}" value="@if(!empty($isinya)) {{$isinya->namaprogram}} @endif">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Deskripsi Program</label>
							<div class="col-md-10">
							<textarea name="des_program" cols="30" rows="10" class="form-control" placeholder="{{$iku->keterangan}}">@if(!empty($isinya)) {{$isinya->deskripsi}} @endif</textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Nilai <span class="text-danger">*</span></label>
							<div class="col-md-10">
							@if(!empty($isinya))
								<input type="number" name="nilai" min="0" step="0.01" max="6" class="form-control numberbox" value="{{$isinya->skala_nilai}}">
							@else
								<input type="number" name="nilai" min="0" step="0.01" max="6" class="form-control numberbox">
							@endif
							</div>
						</div>
						{{-- <div class="form-group row">
							<label class="col-md-2 col-form-label">File Lampiran <span class="text-danger">*</span></label>
							<div class="col-md-10">
								<input type="file" name="file" min="0" max="6" class="form-control">
							</div>
						</div> --}}
						
						<div class="form-group row">
							<div class="col-md-12 text-center">
								<a href="{{url('lomba-kreasi-kreatif')}}" class="btn btn-default btn-lg"><i class="fa fa-arrow-left"></i> Kembali</a>
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
<script>
        $('.numberbox').keyup(function(){
        if($(this).val() > 6){
            alert("Maksimum nilai yang dimasukan adalah 6");
            $(this).val('6');
        }else if ($(this).val() < 0){
            alert("Minimum nilai yang dimasukan adalah 0");
            $(this).val('0');
        }  
    });
    </script>
@endsection