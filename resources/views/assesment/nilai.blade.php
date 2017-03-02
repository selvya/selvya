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
	<!-- END Charts Header -->

	<!-- Mini Charts Row -->
	<!-- Jquery Sparkline (initialized in js/pages/compCharts.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
	<div class="row">
		<div class="col-sm-6">
			<!-- Mini Bar Charts Block -->
			<div class="block full">
				<!-- Mini Bar Charts Title -->
				<div class="block-title">
					<h2><strong>Mini Bar</strong> Charts</h2>
				</div>
				<!-- END Mini Bar Charts Title -->

				<!-- Mini Bar Charts Content -->
				<div class="row text-center">
					<div class="col-sm-4">
						<span id="mini-chart-bar1">2,10,5,6,7,10,3,4</span>
						<h4 class="text-center">Projects</h4>
					</div>
					<div class="col-sm-4">
						<span id="mini-chart-bar2">500,1200,750,3000,1350,1485,980,750</span>
						<h4 class="text-center">Income</h4>
					</div>
					<div class="col-sm-4">
						<span id="mini-chart-bar3">17,8,6,12,20,1,10,5</span>
						<h4 class="text-center">Updates</h4>
					</div>
				</div>
				<!-- END Mini Bar Charts Content -->
			</div>
			<!-- END Mini Bar Charts Block -->
		</div>
		<div class="col-sm-6">
			<!-- Mini Line Charts Block -->
			<div class="block full">
				<!-- Mini Line Charts Title -->
				<div class="block-title">
					<h2><strong>Mini Line</strong> Charts</h2>
				</div>
				<!-- END Mini Line Charts Title -->

				<!-- Mini Line Charts Content -->
				<div class="row text-center">
					<div class="col-sm-4">
						<span id="mini-chart-line1">2,10,5,6,7,10,3,4</span>
						<h4 class="text-center">Projects</h4>
					</div>
					<div class="col-sm-4">
						<span id="mini-chart-line2">500,1200,750,3000,1350,1485,980,750</span>
						<h4 class="text-center">Income</h4>
					</div>
					<div class="col-sm-4">
						<span id="mini-chart-line3">17,8,6,12,20,1,10,5</span>
						<h4 class="text-center">Updates</h4>
					</div>
				</div>
				<!-- END Mini Line Charts Content -->
			</div>
			<!-- END Mini Line Charts Block -->
		</div>
	</div>
	<!-- END Mini Charts Row -->
	<!-- END Pie and Stacked Chart -->
</div>
<!-- END Page Content -->
@endsection
@section('js')
<script src="{{asset('vendor/js/pages/compCharts.js')}}"></script>
<script>$(function(){ CompCharts.init(); });</script>
@endsection