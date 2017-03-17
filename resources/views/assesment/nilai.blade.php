@extends('layout.master')
@section('content')
<style>.highcharts-3d-chart{margin-left:-10px}</style>
<div id="page-content">
	<!-- Charts Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-notes"></i>
				Nilai Assessment</small>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Nilai Assessment</li>
	</ul>
	
	<div class="row">
		<div class="col-sm-12">
			<div class="block full">
				<div class="block-title">
					<h2><strong>Nilai Assessment</strong> Grafik</h2>
				</div>
				<div id="container"></div>
			</div>
		</div>
	</div>
	<!-- END Mini Charts Row -->
	<!-- END Pie and Stacked Chart -->
</div>
<!-- END Page Content -->
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
				beta: 2,
				depth: 70
			}
		},
		title: {
			text: 'Nilai Assessment'
		},
		plotOptions: {
			column: {
				depth: 25,
            	zones: [{
                	value: 50, // Values up to 10 (not including) ...
                    color: 'red' // ... have the color blue.
                },{
                	value: 70, // Values up to 10 (not including) ...
                    color: 'orange' // ... have the color blue.
                },{
                	color: 'green' // Values from 10 (including) and up have the color red
                }]
            }
		}, 
			
		xAxis: {
			categories: [
			<?php $ssks = \App\NilaiAkhir::where('user_id',Auth::user()->id)->get();$xxx ="";$yyy = "";
			foreach($ssks as $nilainya){
				$xxx .= $nilainya->nilai.','; 
				if($nilainya->triwulan == 1){
				echo "'Januari - Maret ".$nilainya->tahun."',"; 					
				}elseif($nilainya->triwulan == 2){
				echo "'April - Juni ".$nilainya->tahun."',"; 					
				}elseif($nilainya->triwulan == 3){
				echo  "'Juli - September ".$nilainya->tahun."',"; 				
				}else{
				echo  "'Oktober - Desember ".$nilainya->tahun."',"; 			
				}
			}?>
			]
		},
		yAxis: {
			title: {
				text: 'Nilai'
			}
		},
		series: [{
			name: 'Triwulan',
			data: [
			{{rtrim($xxx, ',')}}
			]
		}]
	});
</script>
@endsection