@extends('layout.master')
@section('content')
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
				alpha: 10,
				beta: 25,
				depth: 70
			}
		},
		title: {
			text: 'Nilai Assessment'
		},
		plotOptions: {
			column: {
				depth: 25
			}
		},
		xAxis: {
			categories: ['Jan-Mar 2016', 'Apr-Jun 2016' , 'Jul-Sep 2016']
		},
		yAxis: {
			title: {
				text: 'Nilai'
			}
		},
		series: [{
			name: 'Nilai',
			data: [1, 2 , 3]
		}]
	});
</script>
<!-- TUTUP CHART BAR -->
@endsection