@extends('layout.master')
@section('css')
<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables_themeroller.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_table_jui.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_table.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_page.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
<link data-require="jqueryui@*" data-semver="1.10.0" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/css/smoothness/jquery-ui-1.10.0.custom.min.css" />@endsection
@section('content')



<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header content-media">
		<div class="header-section">
			<div class="jumbotron" >
				<div class="col-md-12">
					<h1 >Salam <b>Perubahan</b></h1>
					<h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Anggaran Program Budaya</h4>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Anggaran Program Budaya</li>
	</ul>
	<!-- END Datatables Header -->

	<?php
	$triwulan = cekCurrentTriwulan();
	$all= \App\ReportAssessment::where('daftarindikator_id','2')
	->where('tahun',date('Y'))
	->where('triwulan',$triwulan['current']['triwulan'])
	->join('users','report_assesment.user_id','=','users.id')
	->get();

	$final = \App\ReportAssessment::where('daftarindikator_id','2')
	->where('tahun',date('Y'))
	->where('triwulan',$triwulan['current']['triwulan'])
	->where('final_status','1')
	->join('users','report_assesment.user_id','=','users.id')
	->get();

	$belumfinal = \App\ReportAssessment::where('daftarindikator_id','2')
	->where('tahun',date('Y'))
	->where('triwulan',$triwulan['current']['triwulan'])
	->where('final_status','0')
	->join('users','report_assesment.user_id','=','users.id')
	->get();
	?>

	<!-- Datatables Content -->
	<div class="block full">
		<div class="container">
			<p id="date_filter">
				<span id="date-label-from" class="date-label">From: </span><input class="date_range_filter date" type="text" id="datepicker_from" />
				<span id="date-label-to" class="date-label">To:<input class="date_range_filter date" type="text" id="datepicker_to" />
			</p>
				<b>Rekapitulasi:</b> <br>
				<span class="btn btn-success"><b>Sudah Final</b><br><big>{{count($final)}}</big></span>
				<span class="btn btn-danger"><b>Belum Final</b><br><big>{{count($belumfinal)}}</big></span>
			</div>
			<br>
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover" id="myTable">
					<thead>
						<tr>
							<th>Deputi Komisioner</th>
							<th>Departemen</th>
							<th style="width:13%;">KOJK</th>
							<th style="width:13%;text-align:center">Status</th>
							<th>Tanggal</th>
						</tr>
					</thead>
					<tbody>
						@foreach($all as $data)
						<tr>
							<td>{{$data->deputi_kom}}</td>
							<td>{{$data->departemen}}</td>
							<td>{{$data->kojk}}</td>
							<td style="text-align:center">
								@if($data->final_status == 1)
								<label class="btn btn-success">Sudah Memiliki</label>
								@else
								<label class="btn btn-danger">Belum Memiliki</label>
								@endif
							</td>
							<td>{{$data->created_at}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
		<!-- END Datatables Content -->
	</div>
	<!-- END Page Content -->
	@endsection
	@section('js')
	<script src="{{asset('vendor/js/pages/tablesDatatables.js')}}"></script>
	<script>
		$(function(){ TablesDatatables.init(); });
		// $(document).ready(function(){
		// 	$('#myTable').DataTable();
		// });

		$(function() {
			var oTable = $('#myTable').DataTable({
				"oLanguage": {
					"sSearch": "Filter Data"
				},
				"iDisplayLength": -1,
				"sPaginationType": "full_numbers",

			});




			$("#datepicker_from").datepicker({
				showOn: "button",
				buttonImage: "images/calendar.gif",
				buttonImageOnly: false,
				"onSelect": function(date) {
					minDateFilter = new Date(date).getTime();
					oTable.fnDraw();
				}
			}).keyup(function() {
				minDateFilter = new Date(this.value).getTime();
				oTable.fnDraw();
			});

			$("#datepicker_to").datepicker({
				showOn: "button",
				buttonImage: "images/calendar.gif",
				buttonImageOnly: false,
				"onSelect": function(date) {
					maxDateFilter = new Date(date).getTime();
					oTable.fnDraw();
				}
			}).keyup(function() {
				maxDateFilter = new Date(this.value).getTime();
				oTable.fnDraw();
			});

		});

// Date range filter
minDateFilter = "";
maxDateFilter = "";

$.fn.dataTableExt.afnFiltering.push(
	function(oSettings, aData, iDataIndex) {
		if (typeof aData._date == 'undefined') {
			aData._date = new Date(aData[0]).getTime();
		}

		if (minDateFilter && !isNaN(minDateFilter)) {
			if (aData._date < minDateFilter) {
				return false;
			}
		}

		if (maxDateFilter && !isNaN(maxDateFilter)) {
			if (aData._date > maxDateFilter) {
				return false;
			}
		}

		return true;
	}
	);
</script>
@endsection