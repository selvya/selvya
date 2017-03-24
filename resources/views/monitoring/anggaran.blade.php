@extends('layout.master')

@section('content')
{{-- {{dd($anggaran->tahun)}} --}}

<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1 style="text-transform: uppercase">Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Monitoring Anggaran</h4>
                </div>
            </div>
        </div>
    </div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Anggaran Program Budaya</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="table-responsive">
			<table>
				@php
					$satkerObj = \App\User::findOrFail(getSatker());
				@endphp
				<tr>
					<td>Deputi Komisioner</td>
					<td>:</td>
					<td>{{$satkerObj->nm_deputi_komisioner}}</td>
				</tr>
				<tr>
					<td>Satuan Kerja</td>
					<td>:</td>
					<td>{{$satkerObj->nm_bidang}}</td>
				</tr>
				<tr>
					<td>Direktorat/KOJK</td>
					<td>:</td>
					<td>{{$satkerObj->nm_unit_kerja}}</td>
				</tr>
			</table>
		</div>
		<br>
		<div class="table-responsive">
			<table id="myTable" class="table table-vcenter table-condensed table-bordered">
				<thead>
					<tr>
						<th class="text-center">Tahun</th>
						<th class="text-center">Budget Tahunan</th>
						<th class="text-center">Pengaturan</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center">{{$anggaran->tahun}}</td>
						<td class="text-center">{{'Rp. ' . number_format($anggaran->total_anggaran, 0, ',' , '.')}}</td>
						<td class="text-center">
							<div class="btn-group">
								<a href="{{url('lihat-anggaran')}}" data-toggle="tooltip" title="Lihat" class="btn btn-warning"><i class="fa fa-eye"></i></a>
								<a href="{{url('ubah-anggaran')}}" data-toggle="tooltip" title="Ubah" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
							</div>
						</td>
					</tr>
					
				</tbody>
			</table>
		</div>
	</div>
	<!-- END Datatables Content -->
</div>
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