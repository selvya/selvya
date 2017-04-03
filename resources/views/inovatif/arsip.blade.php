@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1 >Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Arsip OJK Inovatif</h4>
                </div>
            </div>
        </div>
    </div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li><a href="{{url('inovatif')}}">OJK Inovatif</a></li>
		<li>Arsip</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="myTable">
				<thead>
					<tr>
						<th class="text-center">Nama Program</th>
						<th class="text-center">Deskripsi Program</th>
						<th class="text-center">Sasaran</th>
						<th class="text-center">Triwulan</th>
						<th class="text-center">Tahun</th>
						<th class="text-center">Pengaturan</th>
					</tr>
				</thead>
				<tbody>
					@forelse($ikunya as $data)
					<tr>
						<td class="text-center">{{$data->namaprogram}}</td>
						<td class="text-center">{{$data->keterangan}}</td>
						<td class="text-center">{{$data->sasaran}}</td>
						<td class="text-center">{{$data->inovatif_triwulan}}</td>
						<td class="text-center">{{$data->tahun}}</td>
						<td class="text-center"><a href="{{url('tambah/inovatif')}}" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>	</td>
					</tr>
					@empty
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
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
@endsection