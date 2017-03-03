@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-notes"></i>
				<b>Survey</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Survey</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="table-responsive">
			<div class="row">
			<div class="col-sm-6">
				<div class="dataTables_length" id="dataTables-example_length">
					<label>
						<select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm">
							<option value="10">10</option>
							<option value="25">25</option>
							<option value="50">50</option>
							<option value="100">100</option>
						</select> records per page
					</label>
				</div>
			</div>
			<div class="col-sm-6">
				<div id="dataTables-example_filter" class="dataTables_filter"><label><input type="search" class="form-control input-sm" aria-controls="dataTables-example" placeholder="Search"></label>
				</div>
			</div>
			</div>
			<br>
			<table id="example-datatable" class="table table-vcenter table-condensed table-bordered">

				<thead>

					<tr>
						<th class="text-center">Satuan Kerja</th>
						<th class="text-center">Nilai</th>
						<th>Jam dan Tanggal</th>
						<tbody>	
						<tr>
							<td class="">Direktorat Standar Akuntansi dan Tata Kelola Pasar Modal</td>
							<td class="">Baik(4)</td>
							<td class="">27-Sep-2016 19:49:48</td>
							</tr><tr class="">
									<td class="">Direktorat Pengawasan Lembaga Efek</td>
									<td class=" ">Sempurna(5)</td>
									<td class="">27-Sep-2016 19:48:35</td>
								</tr><tr class="">
									<td class="">Direktorat Pengawasan Perbankan (Kantor Regional 1)</td>
									<td class="">Baik(4)</td>
									<td class="">27-Sep-2016 19:48:35</td>
								</tr><tr class="">
									<td class="">Direktorat Literasi dan Edukasi Keuangan</td>
									<td class="">Baik(4)</td>
									<td class="">27-Sep-2016 19:48:35</td>
								</tr><tr class="">
									<td class="">Direktorat Pengawasan Lembaga Efek</td>
									<td class="">Sempurna(5)</td>
									<td class="">27-Sep-2016 19:48:35</td>
								</tr><tr class="">
									<td class=" ">Direktorat Pengawasan Transaksi Efek</td>
									<td class=" ">Sempurna(5)</td>
									<td class="">27-Sep-2016 19:48:34</td>
								</tr><tr class="">
									<td class=" ">Direktorat Perencanaan Logistik</td>
									<td class=" ">Rata-Rata(3)</td>
									<td class="">29-Aug-2016 08:56:00</td>
								</tr><tr class="">
									<td class="">Direktorat Perencanaan Logistik</td>
									<td class="">Sempurna(5)</td>
									<td class="">19-Aug-2016 09:25:46</td>
								</tr><tr class="">
									<td class="">Direktorat Kebijakan Sumber Daya Manusia</td>
									<td class="">Buruk(2)</td>
									<td class="">19-Aug-2016 09:13:31</td>
								</tr>
								<tr class="">
									<td class="">Direktorat Manajemen Perubahan</td>
									<td class="">Baik(4)</td>
									<td class="">19-Aug-2016 09:10:53</td>
								</tr>
							</tbody>
	
			</table>

		</div>
		<br>
		<div class="row">
			<div class="col-sm-6">
				<div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all">Showing 1 to 1 of 1 entries
				</div>
			</div>
			<div class="col-sm-6">
				<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
					<ul class="pagination">
						<li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous"><a href="#">Previous</a>
						</li>
						<li class="paginate_button active" aria-controls="dataTables-example" tabindex="0"><a href="#">1</a>
						</li>
						<li class="paginate_button next disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next"><a href="#">Next</a></li>
					</ul>
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
@endsection