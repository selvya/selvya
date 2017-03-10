@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-imac"></i>
				<b>Grafik Budaya</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Grafik Budaya</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="panel panel-default">
			<div class="panel-heading">
				<form method="post" enctype="multipart/form-data" action="" style="margin:0">
					<select name="tipe">
						<option value="2" selected="selected">Kantor Pusat</option>
						<option value="3">Kantor Regional</option>
						<option value="4">Kantor KOJK</option>
						<option value="5">OJK-wide</option>
					</select>&nbsp;						Period&nbsp;:&nbsp;&nbsp;
					<select name="month">
						<option value="13" selected="selected">Januari - Maret</option>
						<option value="14">April - Juni</option>
						<option value="15">Juli - September</option>
						<option value="16">Oktober-Desember</option>
					</select>&nbsp;<select name="year">
					<option value="2017" selected="selected">2017</option>
					<option value="2016">2016</option>
					<option value="2015">2015</option>
				</select>&nbsp;						
				<a class="btn btn-primary">Lihat&nbsp;<i class="fa fa-arrow-circle-o-right"></i></a>
				<a href="#" class="btn btn-success"><i class="fa fa-print"></i>&nbsp;Export ke Excel</a>
			</form>
		</div>
		<!-- /.panel-heading -->

		<div class="panel-body" style="padding:0px; margin-top:5px; margin-left:-1px;">
			<div class="col-md-12">
				<div id="container1"></div>
				<div id="container2"></div>
				<div id="container3"></div>
				<div id="container4"></div>
				<div id="container5"></div>
				<div id="container6"></div>
				<div id="container7"></div>
				<div id="container8"></div>
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
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<!--CHART BAR-->
<script type="text/javascript">
						//CHART 1
						Highcharts.chart('container1', {
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
								text: 'Manajemen Strategis I'
							},
							plotOptions: {
								column: {
									depth: 25
								}
							},
							xAxis: {
								categories: ['Pengembangan Keijakan Strategis', 'Komunikasi & Internasional' , 'Perencanaan Strategis, Manajemen Perubahan dan Sekretariat Dewan Komisioner' , 'Penyidikan Sektor Jasa Keuangan' , 'Pengawasan IKNB 2A']
							},
							yAxis: {
								title: {
									text: 'Nilai'
								}
							},
							series: [{
								name: 'Nilai',
								data: [10, 6 , 3,8,14]
							}]
						});

							//CHART 2
							Highcharts.chart('container2', {
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
									text: 'Manajemen Strategis II'
								},
								plotOptions: {
									column: {
										depth: 25
									}
								},
								xAxis: {
									categories: ['Oraganisasi & SDM', 'Hukum' , 'Pengelolaan Sistem Informasi' , 'Keuangan' , 'Logistik']
								},
								yAxis: {
									title: {
										text: 'Nilai'
									}
								},
								series: [{
									name: 'Nilai',
									data: [10, 6 , 3,8,14]
								}]
							});

							//CHART 3
							Highcharts.chart('container3', {
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
									text: 'AIMRPK'
								},
								plotOptions: {
									column: {
										depth: 25
									}
								},
								xAxis: {
									categories: ['Audit Internal', 'Manajemen Resiko & Pengendalian Kualitas']
								},
								yAxis: {
									title: {
										text: 'Nilai'
									}
								},
								series: [{
									name: 'Nilai',
									data: [10, 6 ]
								}]
							});

							//CHART 4
							Highcharts.chart('container4', {
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
									text: 'EPK'
								},
								plotOptions: {
									column: {
										depth: 25
									}
								},
								xAxis: {
									categories: ['Perlindungan Konsumen', 'Literasi & Inklusi Keuangan']
								},
								yAxis: {
									title: {
										text: 'Nilai'
									}
								},
								series: [{
									name: 'Nilai',
									data: [10, 6]
								}]
							});

							//CHART 5
							Highcharts.chart('container5', {
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
									text: 'Perbankan'
								},
								plotOptions: {
									column: {
										depth: 25
									}
								},
								xAxis: {
									categories: ['Penelitian & Pengaturan Perbankan', 'Perizinan & Informasi Perbankan']
								},
								yAxis: {
									title: {
										text: 'Nilai'
									}
								},
								series: [{
									name: 'Nilai',
									data: [10, 6]
								}]
							});

							//CHART 6
							Highcharts.chart('container6', {
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
									text: 'Perbankan - Kantor Regional'
								},
								plotOptions: {
									column: {
										depth: 25
									}
								},
								xAxis: {
									categories: ['Kantor Regional 1', 'Kantor Regional 2','Kantor Regional 3','Kantor Regional 4','Kantor Regional 5','Kantor Regional 6']
								},
								yAxis: {
									title: {
										text: 'Nilai'
									}
								},
								series: [{
									name: 'Nilai',
									data: [10, 6,8,4,6,7]
								}]
							});

							//CHART 7
							Highcharts.chart('container7', {
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
									text: 'IKNB'
								},
								plotOptions: {
									column: {
										depth: 25
									}
								},
								xAxis: {
									categories: ['Pengawasan IKNB 1A','Pengawasan IKNB 1B','Pengawasan IKNB 2A','Pengawasan IKNB 2B']
								},
								yAxis: {
									title: {
										text: 'Nilai'
									}
								},
								series: [{
									name: 'Nilai',
									data: [10, 6,8,4]
								}]
							});

										//CHART 8
										Highcharts.chart('container8', {
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
												text: 'Pasar Modal'
											},
											plotOptions: {
												column: {
													depth: 25
												}
											},
											xAxis: {
												categories: ['Pengawasan Pasar Modal 1A','Pengawasan Pasar Modal 1B','Pengawasan Pasar Modal 2A','Pengawasan Pasar Modal 2B']
											},
											yAxis: {
												title: {
													text: 'Nilai'
												}
											},
											series: [{
												name: 'Nilai',
												data: [10, 6,8,4]
											}]
										});
									</script>				
									@endsection