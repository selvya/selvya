@extends('layout.master')
@section('css')

@endsection
@section('content')
<style type="text/css">
	.table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td, .table tbody + tbody, .table-bordered, .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td{
		border:none;
	}
	.form-bordered .form-group{
		padding: 10px 15px!important;
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
				<form id="clickable-wizard" action="page_forms_wizard.html" method="post" class="form-horizontal form-bordered">
					<!-- First Step -->
					<div id="clickable-first" class="step">

						<div class="form-group">
							<div class="col-xs-12">
								<?php 

								$anggaran = \App\Iku::where('iku.namaprogram','serapan_anggaran'.'#'.date('Y').'#'.$triwulan['current']['triwulan'])
								->where('iku.daftarindikator_id','2')
								->join('persentase', 'iku.persen_id' ,'=','persentase.id')
								->first();

								$pimpinan = \App\Iku::where('iku.namaprogram','partisipasi_pimpinan'.'#'.date('Y').'#'.$triwulan['current']['triwulan'])
								->where('iku.daftarindikator_id','4')
								->join('persentase', 'iku.persen_id' ,'=','persentase.id')
								->first();

								$pelaporan = \App\Iku::where('iku.namaprogram','kecepatan_pelaporan'.'#'.date('Y').'#'.$triwulan['current']['triwulan'])
								->where('iku.daftarindikator_id','1')
								->join('persentase', 'iku.persen_id' ,'=','persentase.id')
								->first();
								
								?>
								<ul class="nav nav-pills nav-justified clickable-steps">
									@if(($inovatif != null ) || ($melayani != null) || ($peduli != null))
									<li class="active">
										<a href="javascript:void(0)" data-gotostep="clickable-first">
											<strong>Pelaksanaan Program Budaya <br> <big>{{$persen->nilai}}%</big></strong>
										</a>
									</li>
									@endif
									@if($anggaran != null)
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-second" class="stepnya"><strong>
											Serapan Anggaran <br> <big>{{$anggaran->nilai}}%</big></strong>
										</a>
									</li>
									@endif
									@if($pimpinan != null)
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-third">
											<strong>Partisipan Pimpinan <br> <big>{{$pimpinan->nilai}}%</big></strong>
										</a>
									</li>
									@endif
									@if($pelaporan != null)
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-fourth">
											<strong>Kecepatan Pelaporan <br> <big>{{$pelaporan->nilai}}%</big></strong>
										</a>
									</li>
									@endif
								</ul>
							</div>
						</div>

						<br>
						<!-- ACCORDION -->
						<div class="container" style="max-width: 1000px; overflow: hidden;">
							<!-- OJK MELAYANI -->
							<div class="block">
								<div class="block-title">
									<div class="block-options pull-right">
										<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content">
											<i class="fa fa-arrows-v"></i>
										</a>
									</div>
									<h2><strong>OJK MELAYANI</strong></h2>
								</div>
								<div class="block-content">
									<div class="form-group">
										<label class="col-md-3 control-label">Nama Program </label>
										<div class="col-md-9">
											<h4>Ojk Melayani</h4>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Deskripsi</label>
										<div class="col-md-9">
											<h4>{{$melayani->keterangan}}</h4>
										</div>
									</div>
									@if(count($alatmelayani) > 0)

									@foreach($alatmelayani as $k => $v)
									<?php
									$nama[$k] = collect(explode('#', $v->name));

									?>
									<!-- MYSTERY CALL -->
									<div class="">
										<h5><b>{{title_case(str_replace('_', ' ', $nama[$k]->last()))}}</b></h5>

										@if($v->tipe == 'iku')
										@if($melayani->tipe == 'manual')
										<!-- MANUAL -->

										<div class="form-group">
											<label class="col-md-3 control-label">Nilai <span class="text-danger">*</span></label>
											<div class="col-md-9">
												<input type="number" name="" min="0" max="6" class="form-control">
											</div>
										</div>
										<!-- TUTUP MANUAL -->
										@else
										<div class="form-group">
											<div class="col-md-12 text-center">
												<h5>Menggunakan Data Secara Otomatis dari sistem</h5>
											</div>
										</div>
										@endif

										@elseif($v->tipe == 'parameterized')
										<?php 
										$definisi = \App\DefinisiNilai::where('alatukur_id',$v->id)->where('triwulan', $triwulan['current']['triwulan'])->get();
										?>
										<!-- PARAMETERIZE -->
										<div class="form-group">
											<label class="col-md-3 control-label"> Masukan Nilai <span class="text-danger">*</span></label>
											<div class="col-md-9">
												<select class="form-control">
													@foreach($definisi as $data)
													<option value="{{$data->deskripsi}}">{{$data->deskripsi}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<!-- TUTUP PARAMETERIZE -->
										@endif
									</div>
									<!-- CLOSE MYSTERY CALL -->
									@endforeach
									@else
									KOSONG
									@endif
									
									<div class="form-group">
										<label class="col-md-3 control-label">Lampiran Berkas <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<input type="file" name="file" class="form-control" >
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
							<!-- OJK MELAYANI -->
							

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
								<div class="block-content">
									<div class="form-group">
										<label class="col-md-3 control-label">Nama Program </label>
										<div class="col-md-9">
											<h4>Ojk Peduli</h4>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Deskripsi</label>
										<div class="col-md-9">
											<h4>{{$peduli->keterangan}}</h4>
										</div>
									</div>

									@if(count($alatpeduli) > 0)

									@foreach($alatpeduli as $k => $v)
									<?php
									$nama[$k] = collect(explode('#', $v->name));

									?>
									
									<div class="">
										<h5><b>{{title_case(str_replace('_', ' ', $nama[$k]->last()))}}</b></h5>

										@if($v->tipe == 'iku')
										@if($peduli->tipe == 'manual')
										<!-- MANUAL -->

										<div class="form-group">
											<label class="col-md-3 control-label">Nilai <span class="text-danger">*</span></label>
											<div class="col-md-9">
												<input type="number" name="" min="0" max="6" class="form-control">
											</div>
										</div>
										<!-- TUTUP MANUAL -->
										@else
										<div class="form-group">
											<div class="col-md-12 text-center">
												<h5>Menggunakan Data Secara Otomatis dari sistem</h5>
											</div>
										</div>
										@endif

										@else
										<?php 
										$definisi = \App\DefinisiNilai::where('alatukur_id',$v->id)->where('triwulan', $triwulan['current']['triwulan'])->get();
										?>
										<!-- PARAMETERIZE -->
										<div class="form-group">
											<label class="col-md-3 control-label"> Masukan Nilai <span class="text-danger">*</span></label>
											<div class="col-md-9">
												<select class="form-control">
													@foreach($definisi as $data)
													<option value="{{$data->deskripsi}}">{{$data->deskripsi}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<!-- TUTUP PARAMETERIZE -->
										@endif
									</div>
									@endforeach
									@else
									KOSONG
									@endif
									
									

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
									<div class="form-group">
										<label class="col-md-3 control-label">Lampiran Berkas <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<input type="file" name="file" class="form-control" >
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
								<div class="block-content">
									<div class="form-group">
										<label class="col-md-3 control-label">Nama Program </label>
										<div class="col-md-9">
											<h4>{{$inovatif->namaprogram}}</h4>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Deskripsi</label>
										<div class="col-md-9">
											<h4>{{$inovatif->keterangan}}</h4>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Latarbelakang </label>
										<div class="col-md-9">
											<h4>{{$inovatif->latarbelakang}}</h4>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Sasaran </label>
										<div class="col-md-9">
											<h4>{{$inovatif->sasaran}}</h4>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Tahapan </label>
										<div class="col-md-9">
											<h4>{{$inovatif->tahapan}}</h4>
										</div>
									</div>

									
									@if(count($alatino) > 0)

									@foreach($alatino as $k => $v)
									<?php
									$nama[$k] = collect(explode('#', $v->name));

									?>
									<div class="form-group">
										<label class="col-md-3 control-label">Nama alat ukur {{$k+1}}</label>
										<div class="col-md-9">
											<h4>{{$v->name}}</h4>
										</div>
									</div>

									<div class="">
										@if($v->tipe == 'iku')
										@if($inovatif->tipe == 'parameterized')
										<?php 
										$definisi = \App\DefinisiNilai::where('alatukur_id',$v->id)->where('triwulan', $triwulan['current']['triwulan'])->get();
										?>
										<!-- PARAMETERIZE -->
										<div class="form-group">
											<label class="col-md-3 control-label"> Masukan Nilai <span class="text-danger">*</span></label>
											<div class="col-md-9">
												<select class="form-control">
													@foreach($definisi as $data)
													<option value="{{$data->skala_nilai}}">{{$data->skala_nilai}} - {{$data->deskripsi}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<!-- TUTUP PARAMETERIZE -->
										@endif
										@endif
									</div>
									@endforeach
									@else
									KOSONG
									@endif

									

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
									<div class="form-group">
										<label class="col-md-3 control-label">Lampiran Berkas <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<input type="file" name="file" class="form-control" >
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
								@if(($inovatif != null ) || ($melayani != null) || ($peduli != null))
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-first">
											<strong><i class="fa fa-check"></i>Pelaksanaan Program Budaya <br> <big>{{$persen->nilai}}%</big></strong>
										</a>
									</li>
									@endif
									@if($anggaran != null)
									<li class="active">
										<a href="javascript:void(0)" data-gotostep="clickable-second"><strong>
											Serapan Anggaran <br> <big>{{$anggaran->nilai}}%</big></strong>
										</a>
									</li>
									@endif
									@if($pimpinan != null)
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-third">
											<strong>Partisipan Pimpinan <br> <big>{{$pimpinan->nilai}}%</big></strong>
										</a>
									</li>
									@endif
									@if($pelaporan != null)
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-fourth">
											<strong>Kecepatan Pelaporan <br> <big>{{$pelaporan->nilai}}%</big></strong>
										</a>
									</li>
									@endif
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
								@if(($inovatif != null ) || ($melayani != null) || ($peduli != null))
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-first">
											<strong><i class="fa fa-check"></i>Pelaksanaan Program Budaya <br> <big>{{$persen->nilai}}%</big></strong>
										</a>
									</li>
									@endif
									@if($anggaran != null)
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-second"><strong>
											<i class="fa fa-check"></i>Serapan Anggaran <br> <big>{{$anggaran->nilai}}%</big></strong>
										</a>
									</li>
									@endif
									@if($pimpinan != null)
									<li class="active">
										<a href="javascript:void(0)" data-gotostep="clickable-third">
											<strong>Partisipan Pimpinan <br> <big>{{$pimpinan->nilai}}%</big></strong>
										</a>
									</li>
									@endif
									@if($pelaporan != null)
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-fourth">
											<strong>Kecepatan Pelaporan <br> <big>{{$pelaporan->nilai}}%</big></strong>
										</a>
									</li>
									@endif
								</ul>
							</div>
						</div>
						<br>
						<div class="container" style="max-width: 1000px; overflow: hidden;">
							<div class="block">
								<div class="block-content">
									<!-- <div class="form-group">
										<label class="col-md-3 control-label">Nama Program <span class="text-danger">*</span></label>
										<div class="col-md-9">
											<input type="text" class="form-control">
										</div>
									</div> -->
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
										<label class="col-md-3 control-label">Lampiran Pendukung <span class="text-danger">*</span></label>
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
								@if(($inovatif != null ) || ($melayani != null) || ($peduli != null))
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-first">
											<strong><i class="fa fa-check"></i>Pelaksanaan Program Budaya <br> <big>{{$persen->nilai}}%</big></strong>
										</a>
									</li>
									@endif
									@if($anggaran != null)
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-second"><strong>
											<i class="fa fa-check"></i>Serapan Anggaran <br> <big>{{$anggaran->nilai}}%</big></strong>
										</a>
									</li>
									@endif
									@if($pimpinan != null)
									<li>
										<a href="javascript:void(0)" data-gotostep="clickable-third">
											<strong> <i class="fa fa-check"></i>Partisipan Pimpinan <br> <big>{{$pimpinan->nilai}}%</big></strong>
										</a>
									</li>
									@endif
									@if($pelaporan != null)
									<li class="active">
										<a href="javascript:void(0)" data-gotostep="clickable-fourth">
											<strong>Kecepatan Pelaporan <br> <big>{{$pelaporan->nilai}}%</big></strong>
										</a>
									</li>
									@endif
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
						<div class="col-md-8 col-md-offset-6">
							<input type="reset" class="btn btn-lg btn-warning" id="back2" value="Back">
							<input type="submit" class="btn btn-lg btn-primary" id="next2" value="Next">
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