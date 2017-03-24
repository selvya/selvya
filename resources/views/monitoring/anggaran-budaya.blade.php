@extends('layout.master')
@section('content')


<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	 <div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1 style="text-transform: uppercase">Salam <b>Perubahan</b></h1>
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

	<!-- Datatables Content -->
	<div class="block full">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th>Deputi Komisioner</th>
						<th>Departemen</th>
						<th style="width:13%;">KOJK</th>
						<th style="width:13%;text-align:center">Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Manajemen Strategis IA</td>
						<td>Pengembangan Kebijakan Strategis</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger id="bootBox0" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IB</td>
						<td>Perencanaan Strategis, Manajemen Perubahan dan Sekretariat Dewan Komisioner</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger modalBox" id="bootBox1" data-program-id="94">Sudah Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IB</td>
						<td>Komunikasi dan Internasional</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox2" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IC</td>
						<td>Penyidikan Sektor Jasa Keuangan</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox3" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIA</td>
						<td>Organisasi dan Sumber Daya Manusia</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox4" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIA</td>
						<td>Hukum</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox5" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIB</td>
						<td>Pengelolaan Sistem Informasi</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox6" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIB</td>
						<td>Keuangan</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox7" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIB</td>
						<td>Logistik</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox8" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Audit Internal, Manajemen Resiko dan Pengendalian Kualitas (AIMRPK)</td>
						<td>Audit Internal</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox9" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Audit Internal, Manajemen Resiko dan Pengendalian Kualitas (AIMRPK)</td>
						<td>Manajemen Risiko dan Pengendalian Kualitas</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox10" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Edukasi dan Perlindungan Konsumen</td>
						<td>Perlindungan Konsumen</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox11" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Edukasi dan Perlindungan Konsumen</td>
						<td>Literasi dan Inklusi Keuangan</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox12" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Perbankan I</td>
						<td>Penelitian dan Pengaturan Perbankan</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox13" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Perbankan I</td>
						<td>Perizinan dan Informasi Perbankan</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox14" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Perbankan I</td>
						<td>Perbankan Syariah</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox15" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Perbankan II</td>
						<td>Pemeriksaan Khusus dan Investigasi Perbankan</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox16" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Perbankan II</td>
						<td>Pengembangan Pengawasan dan Manajemen Krisis</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox17" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Perbankan II</td>
						<td>Pengendalian Kualitas Pengawasan Perbankan</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox18" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Perbankan III</td>
						<td>Pengawasan Bank 3</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox19" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Perbankan III</td>
						<td>Pengawasan Bank 2</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox20" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Perbankan III</td>
						<td>Pengawasan Bank 1</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox21" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 7</td>
						<td>Lampung</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox22" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 9</td>
						<td>Kalimantan</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox23" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 1</td>
						<td>DKI Jakarta</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox24" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 9</td>
						<td>Kalimantan Barat</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox25" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 9</td>
						<td>Kalimantan Timur</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox26" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 9</td>
						<td>Kalimantan Tengah</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox27" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 2</td>
						<td>Tasikmalaya</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox28" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 2</td>
						<td>Cirebon</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox29" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 2</td>
						<td>Jawa Barat</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox30" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 4</td>
						<td>Jawa Timur</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox31" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 8</td>
						<td>NTB</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox32" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 8</td>
						<td>NTT</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox33" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 8</td>
						<td>Bali & Nusa Tenggara</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox34" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 3</td>
						<td>Jember</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox35" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 3</td>
						<td>Kediri</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox36" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 3</td>
						<td>Malang</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox37" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 3</td>
						<td>Jawa Tengah & DIY</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox38" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 4</td>
						<td>Solo</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox39" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 4</td>
						<td>D.I. Yogyakarta</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox40" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 4</td>
						<td>Purwokerto</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox41" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 4</td>
						<td>Tegal</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox42" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 5</td>
						<td>Sumatera Bagian Utara</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox43" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 7</td>
						<td>Sumatera Bagian Selatan</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox44" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 7</td>
						<td>Bengkulu</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox45" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 7</td>
						<td>Jambi</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox46" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 5</td>
						<td>Riau</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox47" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 5</td>
						<td>Kepulauan Riau</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox48" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 5</td>
						<td>Sumatera Barat</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox49" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 5</td>
						<td>Aceh</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox50" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 6</td>
						<td>Sulawesi, Maluku, dan Papua</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox51" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 6</td>
						<td>Sulawesi Tenggara</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox52" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 6</td>
						<td>Sulawesi Tengah</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox53" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 6</td>
						<td>Sulawesi Utara</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox54" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 6</td>
						<td>Maluku</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox55" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Manajemen Strategis IIC</td>
						<td>Kantor Regional 6</td>
						<td>Papua</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox56" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Pasar Modal II</td>
						<td>Pengawasan Pasar Modal 2B</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox57" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Pasar Modal II</td>
						<td>Pengawasan Pasar Modal 2A</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox58" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Pasar Modal I</td>
						<td>Pengawasan Pasar Modal 1B</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox59" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>Pasar Modal I</td>
						<td>Pengawasan Pasar Modal 1A</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox60" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>IKNB II</td>
						<td>Pengawasan IKNB 2B</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox61" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>IKNB II</td>
						<td>Pengawasan IKNB 2A</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox62" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>IKNB I</td>
						<td>Pengawasan IKNB 1B</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox63" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>IKNB I</td>
						<td>Pengawasan IKNB 1A</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox64" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
					<tr>
						<td>OJK Institute</td>
						<td>Learning and Assessment Centre</td>
						<td> N/A</td>
						<td style="text-align:center">
						<label class="btn btn-danger" id="bootBox65" data-program-id="">Belum Memiliki</label>
						</td>
					</tr>
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
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection