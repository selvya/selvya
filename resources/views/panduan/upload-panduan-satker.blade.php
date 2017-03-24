@extends('layout.master')
@section('content')
<div id="page-content">
	<!-- Wizard Header -->
	 <div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1 style="text-transform: uppercase">Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Upload Manual Pengguna Satker</h4>
                </div>
            </div>
        </div>
    </div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Upload Manual Pengguna Satker</li>
	</ul>
	<!-- END Wizard Header -->

	<!-- Wizards Row -->
	<div class="row">
		<div class="col-md-12">
			<!-- Wizard with Validation Block -->
			<div class="block">
				<!-- Wizard with Validation Title -->
				<div class="block-title">
					<h2><strong>Form</strong></h2>
				</div>
				@include('include.alert')
				<form action="{{url('upload/manual-book/proses')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label class="col-sm-2 control-label">Upload File</label>
						<div class="col-sm-10">
							<input type="file" name="upload_satker" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-success">Simpan</button>
						</div>
					</div>
				</form>
				<br><br>
				@if(!empty($data))
				<h4><b>Upload Manual Book Terakhir</b></h4>
				<table class="table table-stripped">
					<tr>
						<td>File</td>
						<td>Tanggal</td>
					</tr>
					<tr>
						<td><a href="{{asset('manual-book/satker/'.$data->name)}}">{{$data->name}}</a></td>
						<td>{{date('H:i:s d-m-Y', strtotime($data->created_at))}}</td>
					</tr>
				</table>
				@endif
			</div>
		</div>
	</div>
	<!-- END Wizards Row -->	
</div>
@endsection
@section('js')
@endsection