@extends('layout.master')
@section('content')
<style>
	.jumbotron{
		background: url('{{asset('/img/banner.jpg')}}');
		background-size: cover;
		background-position: center;
		padding: 100px 100px 150px;
		margin-bottom: 0px;
	}

	.jumbotron .col-md-12{
		background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6));
		margin: -100px -100px;
		width:1200px;
	}

	.jumbotron .col-md-12 h1{
		color:#fff;
		padding:30px;
		
	}
	.header-section{
		padding:0px;
	}
	.form-bordered .form-group.form-actions {
		background-color: #fff;
		border:none;}
		.form-bordered .form-group{
			border:none;
			padding: 10px 15px 0;
		}
		.nav-horizontal a{
			padding:12px 100px;
		}
		.content-header, .content-top{
			background-color: transparent;
			border:none;
		}

	</style>

	<div id="page-content">
		<!-- Dashboard 2 Header -->

		<div class="content-header content-media">
			<div class="header-section">
				<div class="jumbotron" >
					<div class="col-md-12"">
						<h1 style="text-transform: uppercase;">Salam <b>Perubahan</b></h1>

					</div>
				</div>
			</div>
		</div>
		<div class="content-header">
			<ul class="nav-horizontal text-center">
				<li class="">
					<a href="javascript:void(0)"><i class="gi gi-charts"></i> Triwulan 1</a>
				</li>
				<li>
					<a href="javascript:void(0)"><i class="gi gi-charts"></i> Triwulan 2</a>
				</li>
				<li>
					<a href="javascript:void(0)"><i class="gi gi-charts"></i> Triwulan 3</a>
				</li>
				<li>
					<a href="javascript:void(0)"><i class="gi gi-charts"></i> Triwulan 4</a>
				</li>
			</ul>
		</div>
		<!-- END Dashboard 2 Header -->

		<!-- Dashboard 2 Content -->
		<div class="row">
			<div class="col-md-6">
				<div class="block">
					<p>
						Selamat datang di dashboard monitoring program budaya OJKway.<br/>
						Dashboard monitoring adalah sebuah media pelaporan program dan anggaran budaya satuan kerja. Program dan anggaran budaya dilaporkan secara rutin per triwulan di 2016 dengan tenggat sebagai berikut: 15 Maret, 15 Juni, 15 September, dan 15 November.Selamat menggunakan,</br>Direktorat Manajemen Perubahan
					</p>
				</div>	
			</div>
		</div>
		@endsection