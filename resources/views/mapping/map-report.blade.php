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
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Daftar Mapping</h4>
                </div>
            </div>
        </div>
    </div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>List Mapping</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="text-right">
			<a href="{{url('report/tambah')}}" class="btn btn-success" data-toggle="tooltip" title="Tambah Mapping"><i class="fa fa-plus"></i> Tambah Mapping</a>
		</div>
		<br>
		@include('include.alert')
		<br>
		<table class="table table-striped table-bordered table-hover dataTable no-footer" id="myTable" aria-describedby="dataTables-example_info">
			<thead>
				<tr role="row">
					<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Urutan: activate to sort column ascending" style="width: 79px;">Urutan</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Nama Mapping: activate to sort column ascending" style="width: 342px;">Nama Mapping</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Group: activate to sort column ascending" style="width: 132px;">Group</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Pengaturan: activate to sort column ascending" style="width: 387px;">
					Pengaturan
				</th>
			</tr>
		</thead>
		<tbody>	
			@foreach($map as $data)
			<tr class="even">
				<td class="sorting_1"><center>{{$data->urutan}}</center></td>
				<td class=" ">{{$data->nama}}</td>
				<td class=" ">Kantor {{$data->kantor}}</td>
				<td align="center" class=" ">
					<a href="{{url('edit/mapping/'.$data->id)}}" class="btn btn-warning" data-toggle="tooltip" title="Sunting Mapping" ><i class="fa fa-pencil"></i></a>
					<a href="{{url('hapus-maping/'.$data->id)}}" class="btn btn-danger" data-toggle="tooltip" title="Hapus Mapping"><i class="fa fa-times"></i></a>
					<a href="{{url('mapping-detail/'.$data->id)}}" class="btn btn-primary" data-toggle="tooltip" title="Detail Mapping"><i class="fa fa-arrow-right"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="row">
		<div class="col-sm-6 pull-right">
			<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
				{{$map->render()}}
			</div>
		</div>
	</div>
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