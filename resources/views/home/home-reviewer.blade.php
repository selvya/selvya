@extends('layout.master')
@section('content')
<style>
	.highcharts-credits{display: none;}
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
		.pie-chart.easyPieChart{margin:0px!important;
			float: left;
			font-size: 16px;}
			.widget-content.text-right.animation-pullDown strong{margin-right:15px}
		</style>

		<div id="page-content">
			<!-- Dashboard 2 Header -->

			<div class="content-header content-media">
				<div class="header-section">
					<div class="jumbotron" >
						<div class="col-md-12"">
							<h1 style="text-transform: uppercase;">Salam <b>Perubahan</b></h1>
							<h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Dashboard Monitoring Program Budaya OJK Way</h4>
						</div>
					</div>
				</div>
			</div>
			<!-- Mini Top Stats Row -->
			<?php 
			$nilainya = \App\NilaiAkhir::where('tahun',date('Y'))->where('triwulan',cekCurrentTriwulan()['current']->triwulan)->groupBy('user_id')->get();
			$monitornya = \App\NilaiAkhirMonitor::where('tahun',date('Y'))->where('triwulan',cekCurrentTriwulan()['current']->triwulan)->groupBy('user_id')->get();
			$inovatif = \App\Iku::where('tahun',date('Y'))->where('programbudaya_id',3)->where('satker','!=',0)->where('inovatif_triwulan',cekCurrentTriwulan()['current']->triwulan)->groupBy('satker')->get();
			$satkernya = \App\User::where('level','satker')->count();
			$ygudah = count($nilainya);
			$ygudahmonitor = count($monitornya);
			$persenudah = $ygudah/$satkernya*100;
			$persenudahmonitor = $ygudahmonitor/$satkernya*100;
			$ygblmmonitor = $satkernya-$ygudahmonitor;
			$persenblmmonitor = $ygblmmonitor/$satkernya*100;
			$ygudahinov = count($inovatif);
			$persenudahinov = $ygudahinov/$satkernya*100;
			$ygblm = $satkernya-$ygudah;
			$persenblm = $ygblm/$satkernya*100;
			$ygblminov = $satkernya-$ygudahinov;
			$persenblminov = $ygblminov/$satkernya*100;
			if($persenudah > 49){	$color = 'green';}
			else{
				$color = 'red';
			}
			if($persenudahinov > 49){	$colorinov = 'green';}
			else{
				$colorinov = 'red';
			}
			if($persenudahmonitor > 49){	$colormonitor = 'green';}
			else{
				$colormonitor = 'red';
			}
			?>
			<div class="row">
				<div class="col-sm-6 col-lg-4">
					<!-- Widget -->
					<a href="" class="widget widget-hover-effect1">
						<div class="widget-simple">
							<div class="pie-chart block-section" data-bar-color="{{$color}}" data-percent="{{$persenudah}}" data-size="63"><span><b>{{$ygudah}}</b></span></div>
							<h3 class="widget-content text-right animation-pullDown">
								{{$ygudah}} <strong>Satker</strong><br>
								<small>Sudah Submit Assessment</small>
							</h3>
						</div>
					</a>
					<!-- END Widget -->
				</div>
				<div class="col-sm-6 col-lg-4">
					<!-- Widget -->
					<a href="" class="widget widget-hover-effect1">
						<div class="widget-simple">
							<div class="pie-chart block-section" data-bar-color="{{$color}}" data-percent="{{$persenblm}}" data-size="63"><span><b>{{$ygblm}}</b></span></div>
							<h3 class="widget-content text-right animation-pullDown">
								{{$ygblm}} <strong>Satker</strong><br>
								<small>Belum Submit Assessment</small>
							</h3>
						</div>
					</a>
					<!-- END Widget -->
				</div>
				<div class="col-sm-6 col-lg-4">
					<!-- Widget -->
					<a href="" class="widget widget-hover-effect1">
						<div class="widget-simple">
							<div class="pie-chart block-section" data-bar-color="{{$colormonitor}}" data-percent="{{$persenudahmonitor}}" data-size="63"><span><b>{{$ygudahmonitor}}</b></span></div>
							<h3 class="widget-content text-right animation-pullDown">
								{{$ygudahmonitor}} <strong>Satker</strong>
								<small>Sudah di Monitor</small>
							</h3>
						</div>
					</a>
					<!-- END Widget -->
				</div>
				<div class="col-sm-6 col-lg-4">
					<!-- Widget -->
					<a href="" class="widget widget-hover-effect1">
						<div class="widget-simple">
							<div class="pie-chart block-section" data-bar-color="{{$colorinov}}" data-percent="{{$persenudahinov}}" data-size="63"><span><b>{{$ygudahinov}}</b></span></div>
							<h3 class="widget-content text-right animation-pullDown">
								{{$ygudahinov}} <strong>Satker</strong>
								<small>Sudah Finalisasi OJK Inovatif</small>
							</h3>
						</div>
					</a>
					<!-- END Widget -->
				</div>
				<div class="col-sm-6 col-lg-4">
					<!-- Widget -->
					<a href="" class="widget widget-hover-effect1">
						<div class="widget-simple">
							<div class="pie-chart block-section" data-bar-color="{{$colorinov}}" data-percent="{{$persenblminov}}" data-size="63"><span><b>{{$ygblminov}}</b></span></div>
							<h3 class="widget-content text-right animation-pullDown">
								{{$ygblminov}} <strong>Satker</strong>
								<small>Belum Finalisasi OJK Inovatif</small>
							</h3>
						</div>
					</a>
					<!-- END Widget -->
				</div>
				<div class="col-sm-6 col-lg-4">
					<!-- Widget -->
					<a href="" class="widget widget-hover-effect1">
						<div class="widget-simple">
							<div class="pie-chart block-section" data-bar-color="{{$colormonitor}}" data-percent="{{$persenblmmonitor}}" data-size="63"><span><b>{{$ygblmmonitor}}</b></span></div>
							<h3 class="widget-content text-right animation-pullDown">
								{{$ygblmmonitor}} <strong>Satker</strong>
								<small>Belum di Monitor</small>
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
						<div id="containernya"></div>
					</div>
				</div>
				<div class="col-md-6">
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
						<?php 
						switch (cekCurrentTriwulan()['current']->triwulan) {
							case 4:
							$tw = 'IV';
							break; 
							case 2:
							$tw = 'II';
							break; 
							case 3:
							$tw = 'III';
							break; 
							default:
							$tw = 'I';
							break; 
						}
						$assa = 'Sekarang Periode TW '.$tw.' ['.date('F', strtotime(cekCurrentTriwulan()['current']->sejak)).'-'.date('F', strtotime(cekCurrentTriwulan()['current']->hingga)).']';
						
						?>
						text: '{{$assa}}'
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
								enabled: false
							},
							showInLegend: true
						}
					},legend: {
						align: 'left',
						layout: 'vertical',
						verticalAlign: 'top',floating: true,
						y: 20,
						x: 0
					},
					series: [{
						type: 'pie',
						name: 'Nilai',
						data: [
						<?php $ssks = \App\ReportAssessment::leftJoin('daftarindikator','report_assesment.daftarindikator_id','=','daftarindikator.id')->where('triwulan',cekCurrentTriwulan()['current']->triwulan)->where('final_status','1')->where('tahun',date('Y'))->groupBy('name')->select('name', DB::raw( 'AVG( hasil ) as hasil1' ) )->get();$xxx ="";$yyy = 100;
						foreach($ssks as $nilainya){
							$yyy -= $nilainya->hasil1;
							echo "['".$nilainya->name."', ".$nilainya->hasil1."],";
						}
						echo "['Tidak Tercapai', ".$yyy."]";?>
						]
					}]
				});
				$(".pie-chart").easyPieChart({barColor:$(this).data("bar-color")?$(this).data("bar-color"):"#777777",trackColor:$(this).data("track-color")?$(this).data("track-color"):"#eeeeee",lineWidth:$(this).data("line-width")?$(this).data("line-width"):3,size:$(this).data("size")?$(this).data("size"):"80",animate:800,scaleColor:!1});Highcharts.chart('container', {
					chart: {
						type: 'column',
						options3d: {
							enabled: true,
							alpha: 1,
							beta: 1,
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
						categories: [
						<?php $ssks = \App\Persentase::leftJoin('daftarindikator','persentase.daftarindikator_id','=','daftarindikator.id')->where('triwulan',cekCurrentTriwulan()['current']->triwulan)->where('tahun',date('Y'))->where('nilai','>',0)->get();
						foreach($ssks as $indi){
							echo "'".$indi->name."',";
						}?>]
					},
					yAxis: {
						title: {
							text: 'Nilai yang di capai'
						}
					},
					series: [{
						name: 'Nilai Indikator',
						data: [
						<?php 
						foreach($ssks as $indi){
							$nilainya = \App\ReportAssessment::where('daftarindikator_id',$indi->daftarindikator_id)->where('triwulan',cekCurrentTriwulan()['current']->triwulan)->where('tahun',date('Y'))->where('final_status','1')->groupBy('daftarindikator_id')->select(DB::raw( 'AVG( nilai ) as nilai1' ) )->value('nilai1');
							if(count($nilainya)<1){$nilainya = 0;}
							if($indi->daftarindikator_id == 3){$nilainya = $nilainya * 6/40;}
							echo number_format((float)$nilainya, 2, '.', '').",";
						}?>]
					}]
				});
			</script>
			<!-- TUTUP CHART PIE -->
			@endsection