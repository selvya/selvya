@extends('layout.master')

@section('content')
<style type="text/css">
	.dataTables_paginate{display: none!important;}
	.dataTables_info{display: none;}
</style>
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1>Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Arsip Assessment</h4>
                </div>
            </div>
        </div>
    </div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li><a href="{{url('lembar-self-assesment')}}">Lembar Assessment</a></li>
		<li>Arsip</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="table-responsive">
			<table>
				<tr>
					<td><b>Deputi Komisioner</b></td>
					<td>:</td>
					<td>Manajemen Strategis IB</td>
				</tr>
				<tr>
					<td><b>Satuan Kerja</b></td>
					<td>:</td>
					<td>Perencanaan Strategis, Manajemen Perubahan dan Sekretariat Dewan Komisioner</td>
				</tr>
				<tr>
					<td><b>Direktorat/KOJK</b></td>
					<td>:</td>
					<td>N/A</td>
				</tr>
			</table>
		</div>
		<br>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover dataTable no-footer" id="myTable" aria-describedby="dataTables-example_info">
				<thead>
					<tr role="row">
						<th>Bulan/Periode</th>
						<th>Tahun</th>
						<th>Progress</th>
						<th>Pengaturan</th>
					</tr>
				</thead>
				<tbody>
					@foreach($arsip as $data)
					<tr class="odd">
						<td class="text-center">{{date('M', strtotime($triwulan['current']['sejak']))}} - {{date('M', strtotime($triwulan['current']['hingga']))}}</td>
						<td class="text-center">{{$data->tahun}}</td>
						<td >
							<div>
								<strong>Final pada :</strong> {{date('d-M-Y', strtotime($data->created_at))}}

								<span class="text-muted pull-right">100% Complete</span>
								
								<div class="progress progress-striped">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
										<span class="sr-only">100% Complete</span>
									</div>
								</div>
							</div>
						</td>
						<td class="text-center">
							<br>
							<a href="{{url('detail/assessment')}}" class="btn btn-primary">Preview </a>
							<span class="btn btn-success"> Sudah di Setujui</span>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="col-md-12 text-center">
				{{$arsip->render()}}
			</div>
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#myTable').DataTable();
	});
</script>
@endsection