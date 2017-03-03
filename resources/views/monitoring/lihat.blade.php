@extends('layout.master')
@section('content')
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-imac"></i>
				<b>Lihat Anggaran Program Budaya</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>lihat Anggaran Budaya</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
	<div class="row">
	<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<form role="form" method="post" enctype="multipart/form-data" action="https://ojkway.com/admin/form/anggaran_edit/94">
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<label for="disabledSelect">Total Anggaran</label>&nbsp;&nbsp;<input class="form-control" type="text" maxlength="14" value="Rp. 100.000.000" disabled="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<table class="table table-striped table-bordered disabled=""">
										<tbody><tr>
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
												<input class="form-control numVal" name="real1" id="real1" type="text" maxlength="14" placeholder="Realisasi Anggaran" value="" disabled="">
												<input type="hidden" name="realizeq1" id="realizeq1" value="0"></td>
											<td>
												<input class="form-control" name="real2" id="real2" type="text" maxlength="14" value="Rp. 0" disabled="">
												<input type="hidden" name="realizeq2" id="realizeq2" value="0"></td>
											<td>
											<input class="form-control" name="real3" id="real3" type="text" maxlength="14" value="Rp. 0" disabled="">
											<input type="hidden" name="realizeq3" id="realizeq3" value="0"></td>
											<td>
												<input class="form-control" name="real4" id="real4" type="text" maxlength="14" value="Rp. 0" disabled="">
												<input type="hidden" name="realizeq4" id="realizeq4" value="0"></td>
										</tr>
										<tr>
											<td><label for="exampleInputFile">Lampiran<br>(Max. 20MB)<br>(.zip,.rar, .pdf, .jpg)</label></td>
											<!-- <td><input class="form-control" type="file" id="exampleInputFile1" disabled="" name="userfile1" onchange="AlertFilesize(document.getElementById('exampleInputFile1').getAttribute('id'),1 )"></td> -->
											<td>Belum ada Lampiran</td>
											<td>Belum ada Lampiran</td>
											<td>Belum ada Lampiran</td>
											<td>Belum ada Lampiran</td>
										</tr>
									</tbody></table>
								</div>
							</div>
						</div>
		<!-- 				<a href="https://ojkway.com/admin/form/anggaran" class="btn btn-default"><i class="fa fa-arrow-circle-o-left"></i>&nbsp;Kembali</a>
						<button type="submit" id="done" class="btn btn-success"><i class="fa fa-floppy-o"></i>&nbsp;Submit</button>
						<input type="hidden" name="pagu" id="pagu" value="100000000">
						<input type="hidden" name="total" id="totalAnnual" value="0"> -->
					</form>
				</div>
			</div>
			<!-- /.row (nested) -->
		</div>
		</div>
		</div>
	<!-- END Datatables Content -->
</div>
<!-- END Page Content -->
<!-- END Page Content -->

@endsection
@section('js')
<script src="{{asset('vendor/js/pages/tablesDatatables.js')}}"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection