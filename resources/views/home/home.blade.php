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
		}.pie-chart.easyPieChart{margin:0px!important;
			float: left;
			font-size: 16px;}
			.widget-content.text-right.animation-pullDown strong{margin-right:15px}
		</style>

		<div id="page-content">
			<!-- Dashboard 2 Header -->

			<div class="content-header content-media">
				<div class="header-section">
					<div class="jumbotron" >
						<div class="col-md-12">
							<h1 style="text-transform: uppercase">Salam <b>Perubahan</b></h1>
							<h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Dashboard Monitoring Program Budaya OJK Way</h4>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6"><div class="row"><?php $ssks = \App\NilaiAkhir::where('user_id',Auth::user()->id)->where('tahun',date('Y'))->orderBy('triwulan')->get();$x = count($ssks); ?>
					@foreach($ssks as $nilaiakhir)
					<?php
					if($nilaiakhir->nilai > 69)
						{	$color = 'green';}
					elseif($nilaiakhir->nilai > 49){	$color = 'orange';}
					elseif($nilaiakhir->nilai > 0){
						$color = 'red';}
						else{
							$color = '#eeeeee';
						}
						?>
						
						<div class="col-sm-12 col-lg-6">
							<a href="" class="widget widget-hover-effect1">
								<div class="widget-simple">
									<div class="pie-chart block-section" data-bar-color="{{$color}}" data-percent="{{$nilaiakhir->nilai}}" data-size="50"><span><b>{{$nilaiakhir->nilai}}</b></span></div>
									<h3 class="widget-content text-right animation-pullDown">
										<strong style="color:{{$color}}">Triwulan @php
											switch ($nilaiakhir->triwulan) {
												case 4:
												echo 'IV';
												break; 
												case 2:
												echo 'II';
												break; 
												case 3:
												echo 'III';
												break; 
												default:
												echo 'I';
												break; 
											}
											@endphp
										</strong>
									</h3>
								</div>
							</a>
						</div>
						@endforeach
						<?php $x++;
						while($x < 5) {?>
						
						
						<div class="col-sm-12 col-lg-6">
							<a href="" class="widget widget-hover-effect1">
								<div class="widget-simple">
									<div class="pie-chart block-section" data-bar-color="blue" data-percent="0" data-size="50"><span><b>0</b></span></div>
									<h3 class="widget-content text-right animation-pullDown">
										<strong style="color:blue">Triwulan @php
											switch ($x) {
												case 4:
												echo 'IV';
												break; 
												case 2:
												echo 'II';
												break; 
												case 3:
												echo 'III';
												break; 
												default:
												echo 'I';
												break; 
											}
											@endphp
										</strong>
									</h3>
								</div>
							</a>
						</div><?php
						$x++;
					}?>
				</div>
				<div class="block">
					<p>
						<center>	Monitoring program budaya OJKway. </center><br> <br>

						Dashboard monitoring adalah sebuah media pelaporan program dan anggaran budaya satuan kerja. Program dan anggaran budaya dilaporkan secara
						rutin per triwulan di {{date('Y')}} dengan tenggat sebagai berikut: 
						per triwulan di tahun 2017 dengan tenggat sebagai berikut: 15 Maret, 8 Juni, 15 September, dan 15 Desember
						<br> <br>
						<div style="text-align:right">
							Selamat menggunakan,<br>
							Direktorat Manajemen Perubahan
						</div>
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
						$nilainya = \App\ReportAssessment::where('daftarindikator_id',$indi->daftarindikator_id)->where('user_id',Auth::user()->id)->where('triwulan',cekCurrentTriwulan()['current']->triwulan)->where('tahun',date('Y'))->value('nilai');
						if(count($nilainya)<1){$nilainya = 0;}
						if($indi->daftarindikator_id == 3){$nilainya = $nilainya * 6/40;}
						echo number_format((float)$nilainya, 2, '.', '').",";
					}?>]
				}]
			});$(".pie-chart").easyPieChart({barColor:$(this).data("bar-color")?$(this).data("bar-color"):"#777777",trackColor:$(this).data("track-color")?$(this).data("track-color"):"#eeeeee",lineWidth:$(this).data("line-width")?$(this).data("line-width"):3,size:$(this).data("size")?$(this).data("size"):"80",animate:800,scaleColor:!1});
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
					<?php $ssks = \App\ReportAssessment::leftJoin('daftarindikator','report_assesment.daftarindikator_id','=','daftarindikator.id')->where('user_id',Auth::user()->id)->where('triwulan',cekCurrentTriwulan()['current']->triwulan)->where('tahun',date('Y'))->get();$xxx ="";$yyy = 100;
					foreach($ssks as $nilainya){
						$yyy -= $nilainya->hasil;
						echo "['".$nilainya->name."', ".$nilainya->hasil."],";
					}
					echo "['Tidak Tercapai', ".$yyy."]";?>
					]
				}]
			});
		</script>
		<!-- TUTUP CHART PIE -->
		@endsection