@extends('layout.master')
@section('content')

<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-imac"></i>
				<b>Ubah Anggaran Program Budaya</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Ubah Anggaran Budaya</li>
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
									<table class="table table-striped table-bordered">
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
												<input class="form-control numVal" name="real1" id="real1" type="text" maxlength="14" placeholder="Realisasi Anggaran" value="">
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
											<td><input class="form-control" type="file" id="exampleInputFile1" name="userfile1" onchange="AlertFilesize(document.getElementById('exampleInputFile1').getAttribute('id'),1)"></td>
											<td>Belum ada Lampiran</td>
											<td>Belum ada Lampiran</td>
											<td>Belum ada Lampiran</td>
										</tr>
									</tbody></table>
								</div>
							</div>
						</div>
						<a href="https://ojkway.com/admin/form/anggaran" class="btn btn-default"><i class="fa fa-arrow-circle-o-left"></i>&nbsp;Kembali</a>
						<button type="submit" id="done" class="btn btn-success"><i class="fa fa-floppy-o"></i>&nbsp;Submit</button>
						<input type="hidden" name="pagu" id="pagu" value="100000000">
						<input type="hidden" name="total" id="totalAnnual" value="0">
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

<!-- Page content -->
<!-- <div id="page-content"> -->
	<!-- Datatables Header -->
<!-- 	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-imac"></i>
				<b>Monitoring Anggaran</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Monitoring Anggaran</li>
	</ul> -->
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<!-- <div class="block full">
		<div class="table-responsive">
			<table>
				<tr>
					<td>Deputi Komisioner</td>
					<td>:</td>
					<td>Manajemen Strategis IB</td>
				</tr>
				<tr>
					<td>Satuan Kerja</td>
					<td>:</td>
					<td>Perencanaan Strategis, Manajemen Perubahan dan Sekretariat Dewan Komisioner</td>
				</tr>
				<tr>
					<td>Direktorat/KOJK</td>
					<td>:</td>
					<td>N/A</td>
				</tr>
			</table>
		</div>
		<br>
		<div class="table-responsive">
			<table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th class="text-center"><i class="gi gi-user"></i></th>
						<th>Client</th>
						<th>Email</th>
						<th>Subscription</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center">1</td>
						<td class="text-center"><img src="{{asset('vendor/img/placeholders/avatars/avatar11.jpg')}}" alt="avatar" class="img-circle"></td>
						<td><a href="javascript:void(0)">client1</a></td>
						<td>client1@company.com</td>
						<td><span class="label label-info">Business</span></td>
						<td class="text-center">
							<div class="btn-group">
								<a href="javascript:void(0)" data-toggle="tooltip" title="Lihat" class="btn btn-warning"><i class="fa fa-eye"></i></a>
								<a href="javascript:void(0)" data-toggle="tooltip" title="Sunting" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
								<a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" class="btn btn-danger"><i class="fa fa-times"></i></a>
							</div>
						</td>
					</tr>
					<tr>
						<td class="text-center">2</td>
						<td class="text-center"><img src="{{asset('vendor/img/placeholders/avatars/avatar9.jpg')}}" alt="avatar" class="img-circle"></td>
						<td><a href="javascript:void(0)">client2</a></td>
						<td>client2@company.com</td>
						<td><span class="label label-warning">Trial</span></td>
						<td class="text-center">
							<div class="btn-group">
								<a href="javascript:void(0)" data-toggle="tooltip" title="Lihat" class="btn btn-warning"><i class="fa fa-eye"></i></a>
								<a href="javascript:void(0)" data-toggle="tooltip" title="Sunting" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
								<a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" class="btn btn-danger"><i class="fa fa-times"></i></a>
							</div>
						</td>
					</tr>
					<tr>
						<td class="text-center">3</td>
						<td class="text-center"><img src="{{asset('vendor/img/placeholders/avatars/avatar15.jpg')}}" alt="avatar" class="img-circle"></td>
						<td><a href="javascript:void(0)">client3</a></td>
						<td>client3@company.com</td>
						<td><span class="label label-success">VIP</span></td>
						<td class="text-center">
							<div class="btn-group">
								<a href="javascript:void(0)" data-toggle="tooltip" title="Lihat" class="btn btn-warning"><i class="fa fa-eye"></i></a>
								<a href="javascript:void(0)" data-toggle="tooltip" title="Sunting" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
								<a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" class="btn btn-danger"><i class="fa fa-times"></i></a>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div> -->
	<!-- END Datatables Content -->
<!-- </div> -->
<!-- END Page Content -->
<!-- END Page Content -->
@endsection
@section('js')
<script src="{{asset('vendor/js/pages/tablesDatatables.js')}}"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection