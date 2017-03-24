@extends('layout.master')
@section('content')
<div id="page-content">
	<!-- FAQ Header -->
	 <div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1 >Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Manual Pengguna</h4>
                </div>
            </div>
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
				@if(!empty($data))
				<a href="{{asset('manual-book/reviewer/'.$data->name)}}" class="btn btn-success"><i class="gi gi-download"></i> Unduh Berkas</a>
				@else
				<a disabled class="btn btn-success"><i class="gi gi-download"></i> Unduh Berkas</a>
				@endif
			</div>
		</div>
		<!-- END FAQ Content -->
	</div>
	<!-- END FAQ Block -->
</div>
<!-- END Page Content -->
@endsection