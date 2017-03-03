@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-group"></i>
				<b>List Mapping</b>
			</h1>
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
			<a href="{{url('report/tambah')}}" class="btn btn-success" data-toggle="tooltip" title="Tambah Mapping"><i class="fa fa-plus"> Tambah Mapping</i></a>
		</div>
		<br>
		<div class="table-responsive">
				
				<div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTables-example_length"><label><select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> records per page</label></div></div><div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" aria-controls="dataTables-example"></label></div></div></div><table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
					<thead>
						<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Urutan: activate to sort column ascending" style="width: 79px;">Urutan</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Nama Mapping: activate to sort column ascending" style="width: 342px;">Nama Mapping</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Group: activate to sort column ascending" style="width: 132px;">Group</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Pengaturan: activate to sort column ascending" style="width: 387px;">Pengaturan</th></tr>
					</thead>
					<tbody>
												
												
												
												
												
												
												
												
												
												
												
												
												
												
											<tr class="odd">
							<td class="sorting_1">2</td>
							<td class=" ">Manajemen Strategis I</td>
							<td class=" ">Kantor Pusat</td>
							<td align="center" class=" ">
								<a href="https://ojkway.com/admin/mapping/edit/1" class="btn yellow">Ubah&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
								<a href="https://ojkway.com/admin/mapping/delete/1" class="btn red">Hapus&nbsp;&nbsp;<i class="fa fa-times"></i></a>
								<a href="https://ojkway.com/admin/mapping/detail/1" class="btn blue">Detail&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>
							</td>
						</tr><tr class="even">
							<td class="sorting_1">3</td>
							<td class=" ">Manajemen Strategis II</td>
							<td class=" ">Kantor Pusat</td>
							<td align="center" class=" ">
								<a href="https://ojkway.com/admin/mapping/edit/2" class="btn yellow">Ubah&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
								<a href="https://ojkway.com/admin/mapping/delete/2" class="btn red">Hapus&nbsp;&nbsp;<i class="fa fa-times"></i></a>
								<a href="https://ojkway.com/admin/mapping/detail/2" class="btn blue">Detail&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>
							</td>
						</tr><tr class="odd">
							<td class="sorting_1">4</td>
							<td class=" ">AIMRPK</td>
							<td class=" ">Kantor Pusat</td>
							<td align="center" class=" ">
								<a href="https://ojkway.com/admin/mapping/edit/3" class="btn yellow">Ubah&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
								<a href="https://ojkway.com/admin/mapping/delete/3" class="btn red">Hapus&nbsp;&nbsp;<i class="fa fa-times"></i></a>
								<a href="https://ojkway.com/admin/mapping/detail/3" class="btn blue">Detail&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>
							</td>
						</tr><tr class="even">
							<td class="sorting_1">5</td>
							<td class=" ">EPK</td>
							<td class=" ">Kantor Pusat</td>
							<td align="center" class=" ">
								<a href="https://ojkway.com/admin/mapping/edit/4" class="btn yellow">Ubah&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
								<a href="https://ojkway.com/admin/mapping/delete/4" class="btn red">Hapus&nbsp;&nbsp;<i class="fa fa-times"></i></a>
								<a href="https://ojkway.com/admin/mapping/detail/4" class="btn blue">Detail&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>
							</td>
						</tr><tr class="odd">
							<td class="sorting_1">6</td>
							<td class=" ">Perbankan</td>
							<td class=" ">Kantor Pusat</td>
							<td align="center" class=" ">
								<a href="https://ojkway.com/admin/mapping/edit/5" class="btn yellow">Ubah&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
								<a href="https://ojkway.com/admin/mapping/delete/5" class="btn red">Hapus&nbsp;&nbsp;<i class="fa fa-times"></i></a>
								<a href="https://ojkway.com/admin/mapping/detail/5" class="btn blue">Detail&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>
							</td>
						</tr><tr class="even">
							<td class="sorting_1">7</td>
							<td class=" ">Perbankan - Kantor Regional</td>
							<td class=" ">Kantor Pusat</td>
							<td align="center" class=" ">
								<a href="https://ojkway.com/admin/mapping/edit/6" class="btn yellow">Ubah&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
								<a href="https://ojkway.com/admin/mapping/delete/6" class="btn red">Hapus&nbsp;&nbsp;<i class="fa fa-times"></i></a>
								<a href="https://ojkway.com/admin/mapping/detail/6" class="btn blue">Detail&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>
							</td>
						</tr><tr class="odd">
							<td class="sorting_1">8</td>
							<td class=" ">IKNB</td>
							<td class=" ">Kantor Pusat</td>
							<td align="center" class=" ">
								<a href="https://ojkway.com/admin/mapping/edit/7" class="btn yellow">Ubah&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
								<a href="https://ojkway.com/admin/mapping/delete/7" class="btn red">Hapus&nbsp;&nbsp;<i class="fa fa-times"></i></a>
								<a href="https://ojkway.com/admin/mapping/detail/7" class="btn blue">Detail&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>
							</td>
						</tr><tr class="even">
							<td class="sorting_1">9</td>
							<td class=" ">Pasar Modal</td>
							<td class=" ">Kantor Pusat</td>
							<td align="center" class=" ">
								<a href="https://ojkway.com/admin/mapping/edit/8" class="btn yellow">Ubah&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
								<a href="https://ojkway.com/admin/mapping/delete/8" class="btn red">Hapus&nbsp;&nbsp;<i class="fa fa-times"></i></a>
								<a href="https://ojkway.com/admin/mapping/detail/8" class="btn blue">Detail&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>
							</td>
						</tr><tr class="odd">
							<td class="sorting_1">10</td>
							<td class=" ">Kantor Regional 1 dan KOJK di Bawahnya</td>
							<td class=" ">Kantor Regional</td>
							<td align="center" class=" ">
								<a href="https://ojkway.com/admin/mapping/edit/9" class="btn yellow">Ubah&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
								<a href="https://ojkway.com/admin/mapping/delete/9" class="btn red">Hapus&nbsp;&nbsp;<i class="fa fa-times"></i></a>
								<a href="https://ojkway.com/admin/mapping/detail/9" class="btn blue">Detail&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>
							</td>
						</tr><tr class="even">
							<td class="sorting_1">11</td>
							<td class=" ">Kantor Regional 2 dan KOJK di Bawahnya</td>
							<td class=" ">Kantor Regional</td>
							<td align="center" class=" ">
								<a href="https://ojkway.com/admin/mapping/edit/10" class="btn yellow">Ubah&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
								<a href="https://ojkway.com/admin/mapping/delete/10" class="btn red">Hapus&nbsp;&nbsp;<i class="fa fa-times"></i></a>
								<a href="https://ojkway.com/admin/mapping/detail/10" class="btn blue">Detail&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>
							</td>
						</tr></tbody>
				</table><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all">Showing 1 to 10 of 14 entries</div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate"><ul class="pagination"><li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous"><a href="#">Previous</a></li><li class="paginate_button active" aria-controls="dataTables-example" tabindex="0"><a href="#">1</a></li><li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">2</a></li><li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next"><a href="#">Next</a></li></ul></div></div></div></div>
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