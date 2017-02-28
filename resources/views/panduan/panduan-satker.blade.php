@extends('layout.master')
@section('content')
<div id="page-content">
	<!-- FAQ Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-book"></i>
				<b>Manual Pengguna</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Manual Pengguna</li>
	</ul>
	<!-- END FAQ Header -->

	<!-- FAQ Block -->
	<div class="block block-alt-noborder">
		<!-- FAQ Content -->
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<p>
					Untuk mengunduh manual pengguna dapat mengeklik tombol di bawah ini.
				</p>
			</div>
			<div class="col-md-12 col-lg-12">
				<a href="" class="btn btn-success"><i class="gi gi-download"></i> Unduh Berkas</a>
			</div>
		</div>
		<!-- END FAQ Content -->
	</div>
	<!-- END FAQ Block -->
</div>
<!-- END Page Content -->
@endsection