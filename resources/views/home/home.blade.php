@extends('layout.master')
@section('content')
<style>
	.highcharts-credits{display: none;}
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
		<!-- Mini Top Stats Row -->
		<div class="row">
			<div class="col-sm-6 col-lg-3">
				<!-- Widget -->
				<a href="" class="widget widget-hover-effect1">
					<div class="widget-simple">
						<div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
							<i class="fa fa-child"></i>
						</div>
						<h3 class="widget-content text-right animation-pullDown">
							50 <strong>Triwulan I</strong>
						</h3>
					</div>
				</a>
				<!-- END Widget -->
			</div>
			<div class="col-sm-6 col-lg-3">
				<!-- Widget -->
				<a href="" class="widget widget-hover-effect1">
					<div class="widget-simple">
						<div class="widget-icon pull-left themed-background-spring animation-fadeIn">
							<i class="fa fa-group"></i>
						</div>
						<h3 class="widget-content text-right animation-pullDown">
							50 <strong>Triwulan II</strong>
						</h3>
					</div>
				</a>
				<!-- END Widget -->
			</div>
			<div class="col-sm-6 col-lg-3">
				<!-- Widget -->
				<a href="" class="widget widget-hover-effect1">
					<div class="widget-simple">
						<div class="widget-icon pull-left themed-background-fire animation-fadeIn">
							<i class="fa fa-envelope"></i>
						</div>
						<h3 class="widget-content text-right animation-pullDown">
							50 <strong>Triwulan III</strong>
						</h3>
					</div>
				</a>
				<!-- END Widget -->
			</div>
			<div class="col-sm-6 col-lg-3">
				<!-- Widget -->
				<a href="" class="widget widget-hover-effect1">
					<div class="widget-simple">
						<div class="widget-icon pull-left themed-background-fire animation-fadeIn">
							<i class="fa fa-envelope"></i>
						</div>
						<h3 class="widget-content text-right animation-pullDown">
							50 <strong>Triwulan IV</strong>
						</h3>
					</div>
				</a>
				<!-- END Widget -->
			</div>
		</div>
		<!-- END Mini Top Stats Row -->
		<!-- END Dashboard 2 Header -->

		<!-- Dashboard 2 Content -->
		<div class="row">
			<div class="col-md-6">
				<div class="block">
					<p>
						Selamat datang di dashboard monitoring program budaya OJKway. <br> <br>

						Dashboard monitoring adalah sebuah media pelaporan program dan anggaran budaya satuan kerja. Program dan anggaran budaya dilaporkan secara rutin per triwulan di 2016 dengan tenggat sebagai berikut: 15 Maret, 15 Juni, 15 September, dan 15 November. <br> <br>

						Selamat menggunakan,<br>
						Direktorat Manajemen Perubahan
					</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="block">
					<div id="containernya"></div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="block">
					<div id="container"></div>
				</div>
			</div>
		</div>
		@endsection
		@section('js')
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/highcharts-3d.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<!--CHART BAR-->
		<script type="text/javascript">
			Highcharts.chart('container', {
				chart: {
					type: 'column',
					options3d: {
						enabled: true,
						alpha: 10,
						beta: 25,
						depth: 70
					}
				},
				title: {
					text: 'Nilai Indikator IKU'
				},
				plotOptions: {
					column: {
						depth: 25
					}
				},
				xAxis: {
					categories: ['Indikator 1', 'Indikator 2' , 'Indikator 3' , 'Indikator 4' , 'Indikator 5', 'Indikator 6', 'Indikator 7']
				},
				yAxis: {
					title: {
						text: 'Nilai per Indikator'
					}
				},
				series: [{
					name: 'Nilai Indikator',
					data: [1, 2 , 3, 4,5,6,7]
				}]
			});
		</script>
		<!-- TUTUP CHART BAR -->

		<!-- CHART PIE -->
		<script type="text/javascript">
			Highcharts.chart('containernya', {
				chart: {
					type: 'pie',
					options3d: {
						enabled: true,
						alpha: 45,
						beta: 0
					}
				},
				title: {
					text: 'Sekarang Periode TW II Januari - Maret'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						depth: 35,
						dataLabels: {
							enabled: true,
							format: '{point.name}'
						}
					}
				},
				series: [{
					type: 'pie',
					name: 'Nilai',
					data: [
					['Indikator I', 40],
					['Indikator II', 40],
					['Indikator III', 10],
					['Indikator IV', 10]
					]
				}]
			});
		</script>
		<!-- TUTUP CHART PIE -->
		@endsection