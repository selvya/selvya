@extends('layout.master')
@section('content')
<div id="page-content">
	<!-- Wizard Header -->
	<div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1 >Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Edit OJK Inovatif</h4>
                </div>
            </div>
        </div>
    </div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li><a href="{{url('inovatif')}}">OJK Inovatif</a></li>
		
				@if($iku->isfinal == 'y')
					<li>Lihat Program OJK Inovatif</li>
				@else
					<li>Ubah Program OJK Inovatif</li>
				@endif
	</ul>
	<!-- END Wizard Header -->
	<!-- Wizards Row -->
	<div class="row">
		<div class="col-md-12">
			<div class="block">
				<div class="block-title">
					<h2><strong>Form Pelaksanaan Program Budaya : OJK Inovatif</strong></h2>
				</div>
				<div class="container" id="ubah"style="max-width:100%">

					@include('include.alert')
				@if($iku->isfinal == 't')
					<form action="{{url('proses/tambah/inovatif')}}" method="POST">
				@endif
						{{csrf_field()}}
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Nama Program</label>
							<div class="col-md-10">
								<input class="form-control" value="{{$iku->namaprogram}}" type="text" name="nama">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Deskripsi Program</label>
							<div class="col-md-10">
								<textarea class="form-control" rows="5" name="deskripsi">{{$iku->keterangan}}</textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Latar Belakang </label>
							<div class="col-md-10">
								<input class="form-control" type="text" value="{{$iku->latarbelakang}}" name="latarbelakang">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Sasaran Program</label>
							<div class="col-md-10">
								<input class="form-control" type="text" value="{{$iku->sasaran}}" name="sasaran">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Tahapan Pelaksanaan </label>
							<div class="col-md-10">
								<input class="form-control" type="text" value="{{$iku->tahapan}}" name="tahapan">
							</div>
						</div>
						<?php 
						$alatukur = \App\AlatUkur::where('iku_id','=',$iku->id)->orderBy('id','asc')->get();
						$k = 0;?>
						@foreach($alatukur as $ukurnya)
						<?php $k++;?>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Alat Ukur</label>
							<div class="col-md-10">
								<label><input type="checkbox" name="cekalatukur{{$k}}"   @if( $ukurnya->active == 1) checked @endif @if( $k == 1) required @endif  value="1" id="cekalatukur{{$k}}"> Gunakan alat ukur berikut (Centang bila digunakan)</label>
								<input type="hidden"value="{{$ukurnya->id}}"name="alatnya[{{$k}}]"/>
								<br><br>
								<input class="form-control alatukur{{$k}}" type="text" name="name{{$k}}" value="{{$ukurnya->name}}" placeholder="Alat Ukur {{$k}}">
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
											<input placeholder="Definisi Nilai {{$i}}" type="text" @if( $k == 1) required @endif name="alt{{$k}}_def{{$i}}_tw{{$j}}" value="<?php echo \App\DefinisiNilai::where('iku_id',$iku->id)->where('alatukur_id','=',$ukurnya->id)->where('tahun','=',date('Y'))->where('triwulan','=',$j)->where('skala_nilai','=',$i)->value('deskripsi');  ?>" class="form-control alatukur{{$k}}">
										</td>

										@endfor
									</tr>
									@endfor
								</table>
							</div>
						</div>
						@endforeach 
						<?php if($k < 3){
						do { $k++; ?>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Alat Ukur</label>
							<div class="col-md-10">
								<label><input type="checkbox" name="cekalatukur{{$k}}" value="1"@if( $k == 1) checked required @endif  id="cekalatukur{{$k}}"> Gunakan alat ukur berikut (Centang bila digunakan)</label>
								<br><br>
								<input class="form-control alatukur{{$k}}" type="text" name="name{{$k}}"  placeholder="Alat Ukur {{$k}}">
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
									@for($i=6; $i>= 1; $i--)

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
						<?php } while ($k < 3); }?>
						<div class="form-group row">
							<div class="col-md-12 text-center">
								<a href="{{url('inovatif')}}" class="btn btn-default btn-lg"><i class="fa fa-arrow-left"></i> Kembali</a>
							@if($iku->isfinal == 't')
								<button class="btn btn-primary btn-lg" type="submit"name="simpan" value="t"><i class="fa fa-save"></i> Simpan</button>
								<button class="btn btn-success btn-lg" type="submit" name="simpan" value="y"><i class=" fa fa-flag"></i> Finalisasi</button>
								@endif
							</div>
						</div>
				@if($iku->isfinal == 't')
					</form>
				@endif
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
<?php
	if($iku->isfinal == 'y'){
echo '$("input,textarea").prop("disabled", true);';
	}
?>
	$(function() {
		 alatukur1();
		 $("#cekalatukur1").click(alatukur1);

		alatukur2();
		$("#cekalatukur2").click(alatukur2);

		alatukur3();
		$("#cekalatukur3").click(alatukur3);
	});

	function alatukur1() {
		if ($('#cekalatukur1').is(':checked')) {
			$(".alatukur1").removeAttr("readonly");

		} else {
			$(".alatukur1").attr("readonly", true);
		}
	}
	function alatukur2() {
		if ($('#cekalatukur2').is(':checked')) {
			$(".alatukur2").removeAttr("readonly").prop('required', true);

		} else {
			$(".alatukur2").attr("readonly", true).prop('required', false);
		}
	}
	function alatukur3() {
		if ($('#cekalatukur3').is(':checked')) {
			$(".alatukur3").removeAttr("readonly").prop('required', true);

		} else {
			$(".alatukur3").attr("readonly", true).prop('required', false);
		}
	}
</script>
@endsection