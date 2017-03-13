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
		<table id="myTable" class="table table-vcenter table-condensed table-bordered">

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