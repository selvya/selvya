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
			<div class="block">
				<div class="block-title">
					<h2><strong>Form Pelaksanaan Program Budaya : OJK Inovatif</strong></h2>
				</div>
				<div class="container" style="max-width:100%">

					@include('include.alert')

					<form action="{{url('proses/tambah/inovatif')}}" method="POST">
						{{csrf_field()}}
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Nama Program</label>
							<div class="col-md-10">
								<input class="form-control" type="text" name="nama">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Deskripsi Program</label>
							<div class="col-md-10">
								<textarea class="form-control" rows="5" name="deskripsi"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Latar Belakang </label>
							<div class="col-md-10">
								<input class="form-control" type="text" name="latarbelakang">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Sasaran Program</label>
							<div class="col-md-10">
								<input class="form-control" type="text" name="sasaran">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Tahapan Pelaksanaan </label>
							<div class="col-md-10">
								<input class="form-control" type="text" name="tahapan">
							</div>
						</div>
						@for($k=1; $k <= 3; $k++)
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Alat Ukur</label>
							<div class="col-md-10">
								<label><input type="checkbox" name="cekalatukur{{$k}}" @if( $k == 1) checked required @endif value="1" id="cekalatukur{{$k}}"> Gunakan alat ukur berikut (Centang bila digunakan)</label>
								<br><br>
								<input class="form-control alatukur{{$k}}" name="name" type="text" @if( $k == 1) required @endif placeholder="Alat Ukur {{$k}}">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-10 pull-right">
								<table class="table table-condensed table-hover table-stripped">
									<tr>
										<th class="text-center" style="width: 10%!important;">Nilai</th>
										<th class="text-center">Triwulan I</th>
										<th class="text-center">Triwulan II</th>
										<th class="text-center">Triwulan III</th>
										<th class="text-center">Triwulan IV</th>
									</tr>
									@for($i=1; $i<= 6; $i++)

									<tr>
										<td class="text-center">Skala {{$i}}</td>
										@for($j=1; $j<=4; $j++)
										<td>
											<input placeholder="Definisi Nilai {{$i}}" type="text" @if( $k == 1) required @endif name="alt{{$k}}_def{{$i}}_tw{{$j}}" class="form-control alatukur{{$k}}">
										</td>

										@endfor
									</tr>
									@endfor
								</table>
							</div>
						</div>
						@endfor
						<div class="form-group row">
							<div class="col-md-12 text-center">
								<a href="{{url('inovatif')}}" class="btn btn-default btn-lg"><i class="fa fa-arrow-left"></i> Kembali</a>
								<button class="btn btn-primary btn-lg" type="submit"name="simpan" value="t"><i class="fa fa-save"></i> Simpan</button>
								<button class="btn btn-success btn-lg" type="submit" name="simpan" value="y"><i class=" fa fa-flag"></i> Finalisasi</button>
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
<script src="{{asset('vendor/js/pages/formsWizard.js')}}"></script>
<script>$(function(){ FormsWizard.init(); });</script>
<script type="text/javascript">
	$(function() {
		// alatukur1();
		// $("#cekalatukur1").click(alatukur1);

		alatukur2();
		$("#cekalatukur2").click(alatukur2);

		alatukur3();
		$("#cekalatukur3").click(alatukur3);
	});

	// function alatukur1() {
	// 	if (this.checked) {
	// 		$(".alatukur1").removeAttr("disabled");

	// 	} else {
	// 		$(".alatukur1").attr("disabled", true);
	// 	}
	// }
	function alatukur2() {
		if (this.checked) {
			$(".alatukur2").removeAttr("disabled").prop('required', true);

		} else {
			$(".alatukur2").attr("disabled", true).prop('required', false);
		}
	}
	function alatukur3() {
		if (this.checked) {
			$(".alatukur3").removeAttr("disabled").prop('required', true);

		} else {
			$(".alatukur3").attr("disabled", true).prop('required', false);
		}
	}
</script>
@endsection