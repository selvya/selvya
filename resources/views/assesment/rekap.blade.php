@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-sort"></i>
				<b>Rekap Assessment</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Rekap Assessment</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="text-right">
			<a href="{{url('arsip/assessment')}}" class="btn btn-default" data-toggle="tooltip" title="Lihat Arsip Assessment"><i class="fa fa-eye"></i></a>
		</div>
		<br>
		<div class="panel panel-default">
			<div class="panel-heading">
				<form method="post" enctype="multipart/form-data" action="">
					<select name="tipe">
						<option value="2" selected="selected">Kantor Pusat</option>
						<option value="3">Kantor Regional</option>
						<option value="4">Kantor KOJK</option>
						<option value="5">OJK-wide</option>
					</select>&nbsp;							Periode&nbsp;:&nbsp;&nbsp;
					<select name="month">
						<option value="13" selected="selected">Januari - Maret</option>
						<option value="14">April - Juni</option>
						<option value="15">Juli - September</option>
						<option value="16">Oktober-Desember</option>
					</select>&nbsp;<select name="year">
					<option value="2017" selected="selected">2017</option>
					<option value="2016">2016</option>
					<option value="2015">2015</option>
				</select>&nbsp;			
				<a class="btn btn-primary">Lihat&nbsp;<i class="fa fa-arrow-circle-o-right"></i></a>
			</form>
		</div>
		<div class="panel-body" style="padding:0px; margin-top:5px; margin-left:-1px;">
			<div class="container" style=" width:100%;margin-bottom: 5px;">
				<b>Detail Rekapitulasi:</b>
				<table>
					<tr>
						<td style="background-color: #ececec;" align="center">
							&nbsp;Sudah Submit&nbsp;<br>
							<a href="#" class="btn btn-success">0</a>
						</td>
						<td>&nbsp;</td>
						<td style="background-color: #ececec;" align="center">
							&nbsp;Belum Submit&nbsp;<br>
							<a href="#" class="btn btn-danger">66</a>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="panel-body" style="padding:0px; margin-top:5px; margin-left:-1px;">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th>Deputi Komisioner</th>
						<th>Departemen</th>
						<th style="width:13%;">KOJK</th>
						<th style="width:13%;text-align:center">Progress</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Manajemen Strategis IA</td>
						<td>Pengembangan Kebijakan Strategis</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox0">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IB</td>
						<td>Perencanaan Strategis, Manajemen Perubahan dan Sekretariat Dewan Komisioner</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox1">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IB</td>
						<td>Komunikasi dan Internasional</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox2">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IC</td>
						<td>Penyidikan Sektor Jasa Keuangan</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox3">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIA</td>
						<td>Organisasi dan Sumber Daya Manusia</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox4">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIA</td>
						<td>Hukum</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox5">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIB</td>
						<td>Pengelolaan Sistem Informasi</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox6">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIB</td>
						<td>Keuangan</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox7">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIB</td>
						<td>Logistik</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox8">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Audit Internal, Manajemen Resiko dan Pengendalian Kualitas (AIMRPK)</td>
						<td>Audit Internal</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox9">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Audit Internal, Manajemen Resiko dan Pengendalian Kualitas (AIMRPK)</td>
						<td>Manajemen Risiko dan Pengendalian Kualitas</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox10">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Edukasi dan Perlindungan Konsumen</td>
						<td>Perlindungan Konsumen</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox11">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Edukasi dan Perlindungan Konsumen</td>
						<td>Literasi dan Inklusi Keuangan</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox12">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Perbankan I</td>
						<td>Penelitian dan Pengaturan Perbankan</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox13">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Perbankan I</td>
						<td>Perizinan dan Informasi Perbankan</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox14">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Perbankan I</td>
						<td>Perbankan Syariah</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox15">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Perbankan II</td>
						<td>Pengendalian Kualitas Pengawasan Perbankan</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox16">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Perbankan II</td>
						<td>Pengembangan Pengawasan dan Manajemen Krisis</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox17">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Perbankan II</td>
						<td>Pemeriksaan Khusus dan Investigasi Perbankan</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox18">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Perbankan III</td>
						<td>Pengawasan Bank 1</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox19">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Perbankan III</td>
						<td>Pengawasan Bank 2</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox20">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Perbankan III</td>
						<td>Pengawasan Bank 3</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox21">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Pasar Modal I</td>
						<td>Pengawasan Pasar Modal 1A</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox22">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Pasar Modal I</td>
						<td>Pengawasan Pasar Modal 1B</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox23">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Pasar Modal II</td>
						<td>Pengawasan Pasar Modal 2A</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox24">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>Pasar Modal II</td>
						<td>Pengawasan Pasar Modal 2B</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox25">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>IKNB I</td>
						<td>Pengawasan IKNB 1A</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox26">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>IKNB I</td>
						<td>Pengawasan IKNB 1B</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox27">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>IKNB II</td>
						<td>Pengawasan IKNB 2A</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox28">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>IKNB II</td>
						<td>Pengawasan IKNB 2B</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox29">Belum Submit</label>

						</td>
					</tr>
					<tr>
						<td>OJK Institute</td>
						<td>Learning and Assessment Centre</td>
						<td> N/A</td>
						<td style="text-align:center">
							<label class="btn btn-danger" id="bootBox30">Belum Submit</label>

						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- /.panel-body -->
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
@endsection