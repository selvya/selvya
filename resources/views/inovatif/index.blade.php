@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-tags"></i>
				<b>OJK Inovatif</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>OJK Inovatif</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
@include('include.alert')
		<div class="text-right">
			<a href="{{url('arsip/inovatif')}}" class="btn btn-default btn-lg" data-toggle="tooltip" title="Arsip OJK Inovatif"><i class='fa fa-book'></i> Arsip</a>
		</div>
		<br>
		<div class="table-responsive">
			<div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
				<div class="row">
					<div class="col-sm-6">
						<div class="dataTables_length" id="dataTables-example_length">
							<label>
								<select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm">
									<option value="10">10</option>
									<option value="25">25</option>
									<option value="50">50</option>
									<option value="100">100</option>
								</select>
								records per page
							</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div id="dataTables-example_filter" class="dataTables_filter">
							<label>Search:<input type="search" class="form-control input-sm" aria-controls="dataTables-example">
							</label>
						</div>
					</div>
				</div>
				<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
					<thead>
						<tr role="row">
							<th style="text-align: center; width: 287px;" class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nama Program: activate to sort column ascending">
								Nama Program
							</th>
							<th style="text-align: center; width: 323px;" class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Deskripsi Program: activate to sort column ascending">
								Deskripsi Program
							</th>
							<th style="text-align: center; width: 197px;" class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Sasaran: activate to sort column ascending">
								Sasaran
							</th>
							<th style="width: 133px; text-align: center;" class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Pengaturan: activate to sort column ascending">
								Pengaturan
							</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$ikunya = \App\Iku::where('daftarindikator_id','3')->where('tipe','parameterized')->where('programbudaya_id','3')->orderBy('id','DESC')->get();
						?>
						@forelse($ikunya as $data)
						<tr class="odd">
							<td class="text-center sorting_1">{{$data->namaprogram}}</td>
							<td class="text-center">{{$data->keterangan}}</td>
							<td class="text-center">{{$data->sasaran}}</td>
							<td align="center">
								@if($data->isfinal == 'y')
									<a href="{{url('tambah/inovatif')}}" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>	
								@else
									<a href="{{url('tambah/inovatif')}}" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</a>	
								@endif()
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="4"> <center><a href="{{url('tambah/inovatif')}}" class="btn btn-success btn-lg" data-toggle="tooltip" title="Tambah OJK Inovatif"><i class="fa fa-plus"></i> Tambah Program Baru OJK Inovatif</a> </center></td>
						</tr>
						@endforelse
					</tbody>
				</table>

			</div>
		</div>
	</div>
	@endsection
	@section('js')
	<script src="{{asset('vendor/js/pages/tablesDatatables.js')}}"></script>
	<script>$(function(){ TablesDatatables.init(); });</script>
	@endsection