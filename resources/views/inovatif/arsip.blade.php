@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-sort"></i>
				<b>Arsip Inovatif</b>
			</h1>
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
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th style="text-align: center;">Nama Program</th>
						<th style="text-align: center;">Deskripsi Program</th>
						<th style="text-align: center;">Tujuan</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Kwetiaw (Kalaw Ambil, Piti Jangan Lupa Yaw)</td>
						<td>PIC menyediakan aneka snack pada rak yang telah disediakan beserta money container, di akhir minggu PIC menghitung uang yang terkumpul dibandingkan dengan jumlah snack yang telah terjual.</td>
						<td>Mengajak pegawai untuk konsisten dalam menerapkan integritas kedalam perilaku sehari-hari</td>
					</tr>
					<tr>
						<td>Es Sundae (Everybody Speaks English day on Friday.. eee..)</td>
						<td>Pada awalnya, program ini direncanakan untuk dilakukan setiap hari Jumat. Namun, karena antusiasme yang tinggi dari para pegawai, atas masukan mereka maka program ini dilakukan setiap hari, dimana mulai pk. 4 sore seluruh pegawai DSMS harus menggunakan ba</td>
						<td>Meningkatkan keberanian dan kemampuan pegawai DSMS dalam berbahasa Inggris</td>
					</tr>
					<tr>
						<td>Kue Lupis (Kumpul-kumpul Pagi di hari Senin)</td>
						<td>Merupakan morning briefing yang dilakukan setiap Senin pagi Pk. 08:00, diawali dengan doa bersama dan pembacaan nilai-nilai strategis.</td>
						<td>Sebagai forum bagi seluruh Direktorat bagi seluruh pegawai di DSMS untuk menyampaikan quick updates tentang hal-hal yang telah selesai dilaksanakan di minggu sebelumnya maupun hal-hal yang akan dilaksanakan di minggu tersebut agar seluruh pegawai saling </td>
					</tr>
					<tr>
						<td>The Flash</td>
						<td>Program ini difokuskan pada penyediaan sarana dan prasarana yang dapat mendukung terciptanya pelayanan yang responsif, antara lain:
							1. Membuat grouping telepon per Direktorat
							2. Membuat daftar no ext. per Direktorat
							3. Membuat group email dan/atau Whatsapp untuk stakeholder masing-masing direktorat, yaitu:
							DMPB : grup email Change Partner dan Change Agent
							DPST : grup email MIA, Tim Penulis
							SKDK : grup email admin MS I, sekretaris
							4. Mengajak semua Insan DSMS aktifkan push e-mail OJK agar e-mail yang masuk dapat direspon kapanpun dan dimanapun
							5. Mengajak semua Insan DSMS selalu response undangan rapat per email (accept/decline/tentative)</td>
							<td>Mendukung pencapaian kinerja Satker, memastikan seluruh insan DSMS memberikan respon yang cepat dalam melayani stakeholdernya.</td>
						</tr>
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
	@endsection