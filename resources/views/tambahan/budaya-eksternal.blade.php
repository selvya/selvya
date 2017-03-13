@extends('layout.master')
@section('css')
<style type="text/css">
	th{text-align: center;}
</style>
@endsection
@section('content')

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal1" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Indikator Pencapaian Kecepatan Laporan</h4>
			</div>
			<div class="modal-body">

				<div id="wadah">

				</div>
			</div>
		</div>
	</div>
</div>
{{-- 
	<button id="anu" data-wara="ilahm"  onclick="showmodal($(this))">Show</button>
	<button id="anu" data-wara="dgghg"  onclick="showmodal($(this))">Show</button>
	<button id="anu" data-wara="fghfgh"  onclick="showmodal($(this))">Show</button>
	<button id="anu" data-wara="ilaerythm"  onclick="showmodal($(this))">Show</button>
	<button id="anu" data-wara="ilahfghhm"  onclick="showmodal($(this))">Show</button>
	<button id="anu" data-wara="gdfg"  onclick="showmodal($(this))">Show</button>
	<button id="anu" data-wara="ilaerthm"  onclick="showmodal($(this))">Show</button>
	--}}

	<!-- Page content -->
	<div id="page-content">
		<!-- Datatables Header -->
		<div class="content-header">
			<div class="header-section">
				<h1>
					<i class="gi gi-tags"></i>
					<b>Budaya Eksternal</b>
				</h1>
			</div>
		</div>
		<ul class="breadcrumb breadcrumb-top">
			<li><a href="{{url('/')}}">Beranda</a></li>
			<li>Budaya Eksternal</li>
		</ul>
		<!-- END Datatables Header -->

		<!-- Datatables Content -->
		<div class="block full">				
		<table class="table table-striped table-bordered table-hover dataTable no-footer" id="myTable" aria-describedby="dataTables-example_info">
				<thead>
					<tr role="row">
						<th>Nama</th>
						<th>Otoritas</th>
						<th>Deputi</th>
						<th>Departemen</th>
						<th>KOJK</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr class="odd text-center">
						<td>Satker DSMS</td>
						<td>DSMS</td>
						<td>DSMS</td>
						<td>DSMS</td>
						<td>DSMS</td>
						<td>
							<a href="{{url('tambah/budaya-eksternal/')}}" class="btn btn-success" data-toggle="tooltip" title="Tambah Budaya Eksternal">Tambah</a>
						</td>
					</tr>
				</tbody>
			</table>
			<!-- END Datatables Content -->
		</div>
		<!-- END Page Content -->
		<!-- END Page Content -->
		@endsection
		@section('js')
		<script src="{{asset('vendor/js/pages/tablesDatatables.js')}}"></script>
		<script>$(function(){ TablesDatatables.init(); });</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#myTable').DataTable();
			});
		</script>
		<script type="text/javascript">
			function showmodal(obj) {
				$('#wadah').text(obj.attr('data-wara'));
				$('#modal1').modal('show');
			}
		</script>
		@endsection