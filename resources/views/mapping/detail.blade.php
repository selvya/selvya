@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1>Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Mapping {{$map->nama}}</h4>
                </div>
            </div>
        </div>
    </div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li><a href="{{url('map-report')}}">List Mapping</a></li>
		<li>{{$map->nama}}</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="text-right">
			<a href="{{url('mapping-satker/add/'.$map->id)}}" class="btn btn-success" data-toggle="tooltip" title="Tambah Satker"><i class="fa fa-plus"></i> Tambah Satker</a>
		</div>
		<br>
		@include('include.alert')
		<br>
		<table class="table table-striped table-bordered table-hover dataTable no-footer" id="myTable" aria-describedby="dataTables-example_info">
			<thead>
				<tr role="row">
					<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Urutan: activate to sort column ascending">Deputi Komisioner</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Nama Mapping: activate to sort column ascending">Departemen/Satuan Kerja</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Group: activate to sort column ascending">Direktorat</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Pengaturan: activate to sort column ascending">
					Pengaturan
				</th>
			</tr>
		</thead>
		<tbody>	
			@foreach($map_sat as $data)
			<tr class="even">
				<td class="sorting_1"><center>{{$data->nm_deputi_komisioner}}</center></td>
				<td class=" ">{{$data->nm_deputi_direktur}}</td>
				<td class=" ">{{$data->nm_unit_kerja}}</td>
				<td align="center" class=" ">
					<a href="{{url('mapping-satker/delete/'.$data->id)}}" class="btn btn-danger" data-toggle="tooltip" title="Hapus Mapping"><i class="fa fa-times"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="row">
		<div class="col-sm-6 pull-right">
			<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
				{{$map_sat->render()}}
			</div>
		</div>
	</div>
</div>
</div>
@endsection
@section('js')
<script src="{{asset('vendor/js/pages/tablesDatatables.js')}}"></script>
<script>$(function(){ TablesDatatables.init(); });
	$(document).ready(function(){
		$('#myTable').DataTable();
	});
</script>
@endsection