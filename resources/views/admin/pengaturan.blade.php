@extends('layout.master')

@section('content')
<!-- Page content -->
	<div id="page-content">
		<!-- Datatables Header -->
		<div class="content-header">
			<div class="header-section">
				<h1>
					<i class="fa fa-cogs"></i>
					<b>Pengaturan</b>
				</h1>
			</div>
		</div>
		<ul class="breadcrumb breadcrumb-top">
			<li><a href="{{url('/')}}">Beranda</a></li>
			<li>Pengaturan</li>
		</ul>

		<div class="block full">
			<table class="table table-condensed table-hover table-stripped">
				<thead>
					<tr>
						<th></th>
						<th>Triwulan I</th>
						<th>Triwulan II</th>
						<th>Triwulan III</th>
						<th>Triwulan IV</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td>
							<input type="text" name="tw1_1" class="form-control">
						</td>
						<td>
							<input type="text" name="tw2_1" class="form-control">
						</td>
						<td>
							<input type="text" name="tw3_1" class="form-control">
						</td>
						<td>
							<input type="text" name="tw4_1" class="form-control">
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection

@section('js')

@endsection