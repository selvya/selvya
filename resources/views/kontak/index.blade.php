@extends('layout.master')
@section('content')
<div id="page-content">
	<!-- FAQ Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="fa fa-info"></i>
				<b>Kontak Kami</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Kontak</li>
	</ul>
	<!-- END FAQ Header -->

	<!-- FAQ Block -->
	<div class="block block-alt-noborder">
		<!-- FAQ Content -->
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<p>
					Untuk informasi dan pertanyaan lebih lanjut dapat ditanyakan kepada konsultan satuan kerja masing-masing.
				</p>
				<p>
					Untuk informasi dan pertanyaan teknis terkait penggunaan dashboard <br>monitoring ini dapat menghubungi : <br>
					Mika Hasanah (Direktorat Manajemen Perubahan) <br>
					ext: <a href="mailto:mika@ojk.go.id">mika@ojk.go.id</a> <br>
					ext: 6982/8474
				</p>
			</div>
		</div>
		<!-- END FAQ Content -->
	</div>
	<!-- END FAQ Block -->
</div>
<!-- END Page Content -->
@endsection