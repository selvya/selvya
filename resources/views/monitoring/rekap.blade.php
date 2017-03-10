@extends('layout.master')
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-imac"></i>
				<b>Rekap Monitoring</b>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li>Rekap Monitoring</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div class="table-responsive">
			<table>
				<tr>
					<td>Deputi Komisioner</td>
					<td>:</td>
					<td>Manajemen Strategis IB</td>
				</tr>
				<tr>
					<td>Satuan Kerja</td>
					<td>:</td>
					<td>Perencanaan Strategis, Manajemen Perubahan dan Sekretariat Dewan Komisioner</td>
				</tr>
				<tr>
					<td>Direktorat/KOJK</td>
					<td>:</td>
					<td>N/A</td>
				</tr>
			</table>
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
					</select>&nbsp;						&nbsp;Periode&nbsp;:
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
				<a class="btn btn-primary">Lihat <i class="fa fa-arrow-circle-o-right"></i></a>
			</form>
		</div>
		<div class="panel-body" style="padding:0px; margin-top:5px; margin-left:-1px;">
			<div class="container" style=" width:100%;margin-bottom: 5px;">
				<b>Detail Rekapitulasi:</b>
				<table>
					<tr>
						<td style="background-color: #ececec;" align="center">
							&nbsp;Sudah Dilakukan&nbsp;<br>
							<a href="#" class="btn btn-success">0</a>
						</td>
						<td>&nbsp;</td>
						<td style="background-color: #ececec;" align="center">
							&nbsp;Belum Dilakukan&nbsp;<br>
							<a href="#" class="btn btn-danger">66</a>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="panel-body" style="padding:0px; margin-top:5px; margin-left:-1px;">
		<table class="table table-striped table-bordebtn-danger table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th>Deputi Komisioner</th>
						<th>Departemen</th>
						<th style="width:13%;">KOJK</th>
						<th style="width:13%;text-align:center">Status Monitoring</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Manajemen Strategis IA</td>
						<td>Pengembangan Kebijakan Strategis</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox0" data-result="no" data-form-id="no" data-dept-id="1" data-satker-id="1" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IB</td>
						<td>Perencanaan Strategis, Manajemen Perubahan dan Sekretariat Dewan Komisioner</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox1" data-result="no" data-form-id="no" data-dept-id="7" data-satker-id="2" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IB</td>
						<td>Komunikasi dan Internasional</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox2" data-result="no" data-form-id="no" data-dept-id="7" data-satker-id="3" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IC</td>
						<td>Penyidikan Sektor Jasa Keuangan</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox3" data-result="no" data-form-id="no" data-dept-id="15" data-satker-id="4" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIA</td>
						<td>Organisasi dan Sumber Daya Manusia</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox4" data-result="no" data-form-id="no" data-dept-id="8" data-satker-id="5" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIA</td>
						<td>Hukum</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox5" data-result="no" data-form-id="no" data-dept-id="8" data-satker-id="6" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIB</td>
						<td>Pengelolaan Sistem Informasi</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox6" data-result="no" data-form-id="no" data-dept-id="9" data-satker-id="7" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIB</td>
						<td>Keuangan</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox7" data-result="no" data-form-id="no" data-dept-id="9" data-satker-id="8" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIB</td>
						<td>Logistik</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox8" data-result="no" data-form-id="no" data-dept-id="9" data-satker-id="9" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Audit Internal, Manajemen Resiko dan Pengendalian Kualitas (AIMRPK)</td>
						<td>Audit Internal</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox9" data-result="no" data-form-id="no" data-dept-id="2" data-satker-id="10" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Audit Internal, Manajemen Resiko dan Pengendalian Kualitas (AIMRPK)</td>
						<td>Manajemen Risiko dan Pengendalian Kualitas</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox10" data-result="no" data-form-id="no" data-dept-id="2" data-satker-id="11" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Edukasi dan Perlindungan Konsumen</td>
						<td>Perlindungan Konsumen</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox11" data-result="no" data-form-id="no" data-dept-id="3" data-satker-id="12" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Edukasi dan Perlindungan Konsumen</td>
						<td>Literasi dan Inklusi Keuangan</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox12" data-result="no" data-form-id="no" data-dept-id="3" data-satker-id="13" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Perbankan I</td>
						<td>Penelitian dan Pengaturan Perbankan</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox13" data-result="no" data-form-id="no" data-dept-id="4" data-satker-id="14" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Perbankan I</td>
						<td>Perizinan dan Informasi Perbankan</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox14" data-result="no" data-form-id="no" data-dept-id="4" data-satker-id="15" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Perbankan I</td>
						<td>Perbankan Syariah</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox15" data-result="no" data-form-id="no" data-dept-id="4" data-satker-id="16" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Perbankan II</td>
						<td>Pengendalian Kualitas Pengawasan Perbankan</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox16" data-result="no" data-form-id="no" data-dept-id="12" data-satker-id="17" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Perbankan II</td>
						<td>Pengembangan Pengawasan dan Manajemen Krisis</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox17" data-result="no" data-form-id="no" data-dept-id="12" data-satker-id="18" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Perbankan II</td>
						<td>Pemeriksaan Khusus dan Investigasi Perbankan</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox18" data-result="no" data-form-id="no" data-dept-id="12" data-satker-id="19" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Perbankan III</td>
						<td>Pengawasan Bank 1</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox19" data-result="no" data-form-id="no" data-dept-id="13" data-satker-id="20" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Perbankan III</td>
						<td>Pengawasan Bank 2</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox20" data-result="no" data-form-id="no" data-dept-id="13" data-satker-id="21" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Perbankan III</td>
						<td>Pengawasan Bank 3</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox21" data-result="no" data-form-id="no" data-dept-id="13" data-satker-id="22" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Pasar Modal I</td>
						<td>Pengawasan Pasar Modal 1A</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox22" data-result="no" data-form-id="no" data-dept-id="5" data-satker-id="29" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Pasar Modal I</td>
						<td>Pengawasan Pasar Modal 1B</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox23" data-result="no" data-form-id="no" data-dept-id="5" data-satker-id="30" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Pasar Modal II</td>
						<td>Pengawasan Pasar Modal 2A</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox24" data-result="no" data-form-id="no" data-dept-id="10" data-satker-id="31" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>Pasar Modal II</td>
						<td>Pengawasan Pasar Modal 2B</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox25" data-result="no" data-form-id="no" data-dept-id="10" data-satker-id="32" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>IKNB I</td>
						<td>Pengawasan IKNB 1A</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox26" data-result="no" data-form-id="no" data-dept-id="6" data-satker-id="33" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>IKNB I</td>
						<td>Pengawasan IKNB 1B</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox27" data-result="no" data-form-id="no" data-dept-id="6" data-satker-id="34" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>IKNB II</td>
						<td>Pengawasan IKNB 2A</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox28" data-result="no" data-form-id="no" data-dept-id="11" data-satker-id="35" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>IKNB II</td>
						<td>Pengawasan IKNB 2B</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox29" data-result="no" data-form-id="no" data-dept-id="11" data-satker-id="36" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
					<tr>
						<td>OJK Institute</td>
						<td>Learning and Assessment Centre</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox30" data-result="no" data-form-id="no" data-dept-id="18" data-satker-id="41" data-direktorat-id="1">Belum Dilakukan Monitoring</label>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
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