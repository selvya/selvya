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
			<table class="table table-striped table-bordered table-hover dataTable no-footer" id="myTable" aria-describedby="dataTables-example_info">
				<thead>
					<tr role="row">
						<th class="text-center">Nama Program</th>
						<th class="text-center">Deskripsi Program</th>
						<th class="text-center">Sasaran</th>
						<th class="text-center">Pengaturan</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$triwulan = cekCurrentTriwulan();
					$ikunya = \App\Iku::where('daftarindikator_id','3')
					->where('tipe','parameterized')
					->where('programbudaya_id','3')
					->where('satker',Auth::user()->id)
					->where('inovatif_triwulan',$triwulan['current']['triwulan'])
					->orderBy('id','DESC')
					->get();
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