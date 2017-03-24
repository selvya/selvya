@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1 >Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Arsip OJK Inovatif</h4>
                </div>
            </div>
        </div>
    </div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li><a href="{{url('inovatif')}}">OJK Inovatif</a></li>
		<li>Arsip</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="myTable">
				<thead>
					<tr>
						<th class="text-center">Nama Program</th>
						<th class="text-center">Deskripsi Program</th>
						<th class="text-center">Tujuan</th>
						<th class="text-center">Triwulan</th>
						<th class="text-center">Tahun</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					// $triwulan = cekCurrentTriwulan();
					$ikunya = \App\Iku::where('daftarindikator_id','3')
					->where('tipe','parameterized')
					->where('programbudaya_id','3')
					->where('isfinal','y')
					->where('satker',Auth::user()->id)
					
					->get();
					?>
					@forelse($ikunya as $data)
					<tr>
						<td>{{$data->namaprogram}}</td>
						<td>{{$data->keterangan}}</td>
						<td>{{$data->tujuan}}</td>
						<td>{{$data->inovatif_triwulan}}</td>
						<td>{{$data->tahun}}</td>
					</tr>
					@empty
					@endforelse
				</tbody>
			</table>
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