@extends('layout.master')
@section('css')
<style type="text/css">
table>tbody>tr>td{padding: 0px;}
	#header {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		text-align: center;
		font-size: 24px;
		color: #a32020;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}
	p{color: #666;}
	
	
	#container{
		margin: 5px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	.label{
		margin:2px;
	}
	.content{
		background-color:#ffffff;
		border: 1px solid #000;
		height: 100%;
	}
	.title{
		margin-top: 15px;
		background-color:#bfbfbf;
	}
	.subtitle{
		margin-top: 0px;
	}
	.content p, .title p, .subtitle p, .label p{
		margin:2px;
	}
</style>
@endsection
@section('content')
<!-- Page content -->
<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header content-media">
        <div class="header-section">
            <div class="jumbotron" >
                <div class="col-md-12">
                    <h1>Salam <b>Perubahan</b></h1>
                    <h4 style="color: #fff; padding: 0px 20px;">Selamat Datang di Detail Assesment</h4>
                </div>
            </div>
        </div>
    </div>
	<ul class="breadcrumb breadcrumb-top">
		<li><a href="{{url('/')}}">Beranda</a></li>
		<li><a href="{{url('arsip-assesment')}}">Arsip Assessment</a></li>
		<li>Detail Assessment</li>
	</ul>
	<!-- END Datatables Header -->

	<!-- Datatables Content -->
	<div class="block full">
		<div id="header">
			<table>
				<tr>
					<td>
						<img src="https://ojkway.com/public/img/logo.png" height="50">
					</td>
					<td align="center" width="80%"><b>Monitoring Program Budaya</b></td>
					<td>
						<img src="https://ojkway.com/public/img/logo-ojkwayinpresiv.png" height="50">
					</td>
				</tr>
			</table>
		</div>
		<div id="body">
			<table>
				<tr>
					<td width="20%"><div class="label"><p>Nama Pengisi Form:</p></div></td>
					<td width="25%"><div class="content"><p>Gitasasti Djais</p></div></td>
					<td width="6%">&nbsp;</td>
					<td width="15%"><div class="label"><p>Change Partner:</p></div></td>
					<td><div class="content"><p>Gitasasti Djais</p></div></td>
				</tr>
				<tr>
					<td><div class="label"><p>Periode:</p></div></td>
					<td><div class="content"><p>April - Juni</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Tahun:</p></div></td>
					<td><div class="content"><p>2015</p></div></td>
				</tr>
				<tr>
					<td><div class="label"><p>Deputi Komisioner:</p></div></td>
					<td colspan=4><div class="content"><p>Manajemen Strategis IB</p></div></td>
				</tr>
				<tr>
					<td><div class="label"><p>Departemen:</p></div></td>
					<td colspan=4><div class="content"><p>Perencanaan Strategis, Manajemen Perubahan dan Sekretariat Dewan Komisioner</p></div></td>
				</tr>
				<tr>
					<td><div class="label"><p>Nama Pimpinan:</p></div></td>
					<td colspan=4><div class="content"><p>Sri R.A. Faisal</p></div></td>
				</tr>
				<tr>
					<td><div class="label"><p>Jabatan:</p></div></td>
					<td colspan=4><div class="content"><p>Kepala Departemen</p></div></td>
				</tr>
				<tr>
					<td colspan=5><div class="title"><p>Program Budaya 1: <b><u>SHARING INFORMASI</u></b></p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nama Program:</p></div></td>
					<td colspan=4><div class="content"><p>BISKUIT (Berbagi Ilmu Setiap Kamis Untuk Kita)</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nilai <i>Self Assessment</i>:</p></div></td>
					<td colspan=4><div class="content"><p>6 - Sudah dilakukan, dihadiri sebagian besar pegawai, dilakukan dgn kreatif, konsisten, mendorong capaian kinerja</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Attachment:</p></div></td>
					<td colspan=4>
						<a href="https://ojkway.com/admin/form/download_file/1/KlussKCbfFaTw0n" target="_blank" class="btn btn-warning">Download Lampiran</a>
					</td>
				</tr>
				<tr>
					<td colspan=5><div class="subtitle"><p><b>Keterangan:</b></p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Konsistensi:</p></div></p></td>
					<td><div class="content"><p>Sudah dilakukan secara konsisten</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Pelaksanaan sharing informasi di DSMS sudah dilakukan secara konsisten (min 1x/bulan mempertimbangkan tk kesibukan Satker), dg topik beragam, baik yg terkait tupoksi maupun yg bersifat pengayaan wawasan, narasumber dari internal dan eksternal Satker.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Kreativitas:</p></div></p></td>
					<td><div class="content"><p>Kreativitas digunakan untuk sosialisasi dan monitoring</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Dalam rangka menarik sebanyak mungkin kehadiran peserta, undangan dilakukan lwt poster yg menarik yang di-blast melalui e-mail, serta pemilihan snack yg menarik, yang dicantumlan dlm poster. Undangan di-blast H-2 atau H-1, dan di remind pada hari-H.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Dokumentasi:</p></div></p></td>
					<td><div class="content"><p>Sudah terdokumentasi</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Sudah terdokumentasi dengan baik</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Dampak Pada Perilaku:</p></div></p></td>
					<td><div class="content"><p>Sudah terlihat perbaikan perilaku</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Sudah terlihat perubahan perilaku, dimana pada saat ini lebih banyak pegawai Satker yang berinisiatif untuk menjadi narasumber selanjutnya, maupun menyumbangkan ide mengenai topik selanjutnya.</p></div></td>
				</tr>
				<tr>
					<td colspan=5><div class="title"><p>Program Budaya 2: <b><u>EFEKTIVITAS RAPAT</u></b></p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nama Program:</p></div></td>
					<td colspan=4><div class="content"><p>Roti Jala (Rapat On Time Jangan Telat)</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nilai <i>Self Assessment</i>:</p></div></td>
					<td colspan=4><div class="content"><p>6 - Rakor Satker terencana, tepat waktu, tertib administrasi, risalah dibagikan</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Attachment:</p></div></td>
					<td colspan=4>
						<a href="https://ojkway.com/admin/form/download_file/2/KlussKCbfFaTw0n" target="_blank" class="btn btn-warning">Download Lampiran</a>
					</td>
				</tr>
				<tr>
					<td colspan=5><div class="subtitle"><p><b>Keterangan:</b></p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Tepat Waktu:</p></div></p></td>
					<td><div class="content"><p>Sudah tepat waktu</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Rapat dilaksanakan On Time sesuai jadwal, tidak saling tunggu menunggu. Selain itu, dlm rapat, pemimpin rapat atau seseorang yg ditunjuk berfungsi menjadi timekeeper agar rapat berjalan dgn efektif, tidak mengganggu jadwal lain, dan tujuan tercapai.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Konsistensi:</p></div></p></td>
					<td><div class="content"><p>Sudah dilakukan secara konsisten</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Konsistensi dalam menjalankan tata tertib rapat telah dilakukan, baik dalam rapat internal Satker, maupun lintas Satker.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Tertib Undangan:</p></div></p></td>
					<td><div class="content"><p>Dibagikan &lt; H-2 rapat</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Undangan maupun Nota Dinas di-blast melalui e-mail kepada seluruh peserta paling tidak H-3 sebelum rapat.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Tujuan dan Agenda Rapat:</p></div></p></td>
					<td><div class="content"><p>Ada - disebutkan</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Tujuan dan Agenda Rapat sudah disebutkan dalam undangan, dengan tujuan agar seluruh peserta datang dengan "well prepared". Apabila ada salah seorang undangan berhalangan, ybs dapat mengutus rekannya yang dianggap paling menguasai materi.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Tertib Daftar Hadir:</p></div></p></td>
					<td><div class="content"><p>Ada</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Daftar hadir harus selalu ada dalam setiap rapat, dan diarsipkan dengan baik oleh Satker. Selain itu, pada daftar hadir ditambahkan pula kolom "jam kedatangan".</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Tertib Notulen:</p></div></p></td>
					<td><div class="content"><p>Dibuat dan dibagikan H+2</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Salah satu hal yang terkadang dalam membagikan notulensi pada hari H adalah: seringkali subjek yang dibahas dlm rapat tsb membutuhkan koreksi dan konfirmasi dari para pimpinan sebelum dapat disebarkan ke seluruh peserta.</p></div></td>
				</tr>
				<tr>
					<td colspan=5><div class="title"><p>Program Budaya 3: <b><u>SALAM OJK</u></b></p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nama Program:</p></div></td>
					<td colspan=4><div class="content"><p>Samosa (Sapa dengan Ramah, Sopan dan Santun)</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nilai <i>Self Assessment</i>:</p></div></td>
					<td colspan=4><div class="content"><p>4 - Hasil 3x mystery call: mengangkat lebih dari dering ke-3, memenuhi standar salam OJK</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Attachment:</p></div></td>
					<td colspan=4>
						<a href="https://ojkway.com/admin/form/download_file/3/KlussKCbfFaTw0n" target="_blank" class="btn btn-warning">Download Lampiran</a>
					</td>
				</tr>
				<tr>
					<td colspan=5><div class="subtitle"><p><b>Keterangan:</b></p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Angkat Sebelum Dering ke-3:</p></div></p></td>
					<td><div class="content"><p>Ya</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Sebagian besar pegawai tlh memiliki "awareness" utk megangkat telepon sebelum dering ke-3. Apabila ada panggilan masuk kepada salah satu rekan yang sedang  tidak berada di tempat, maka pegawai terdekat harus menjawab telepon.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Standar Pengucapan:</p></div></p></td>
					<td><div class="content"><p>Sudah sesuai</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Pada umumnya, standar pengucapan seudah dipraktekkan dengan baik, oleh pimpinan hingga staf.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Santun dan Ramah:</p></div></p></td>
					<td><div class="content"><p>Belum</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Selain keramahan, salah satu aspek lainnya yang menjadi faktor penilaian dalam monitoring adalah inisiatif untuk meneruskan pesan kepada pegawai yang dituju.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Konsistensi:</p></div></p></td>
					<td><div class="content"><p>Sudah dilakukan secara konsisten</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Dilakukan secara konsisten, dan diingatkan terus menerus dalam setiap kesempatan, baik oleh Kepala Satker, CP, maupun antar pegawai. Selain itu, ditempelkan panduan dalam menjawab telepon di tiap pesawat.</p></div></td>
				</tr>
				<tr>
					<td colspan=5><div class="title"><p>Program Budaya 4: <b><u>STANDAR PENAMPILAN</u></b></p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nama Program:</p></div></td>
					<td colspan=4><div class="content"><p>Bakso (Berpenampilan yang Keren dan Sopan)</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nilai <i>Self Assessment</i>:</p></div></td>
					<td colspan=4><div class="content"><p>6 - 100% pegawai berpenampilan sesuai peraturan &amp; beratribut lengkap, dimonitor secara kreatif &amp; konsisten</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Attachment:</p></div></td>
					<td colspan=4>
						<a href="https://ojkway.com/admin/form/download_file/4/KlussKCbfFaTw0n" target="_blank" class="btn btn-warning">Download Lampiran</a>
					</td>
				</tr>
				<tr>
					<td colspan=5><div class="subtitle"><p><b>Keterangan:</b></p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Konsistensi:</p></div></p></td>
					<td><div class="content"><p>Sudah dilakukan secara konsisten</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Hampir seluruh pegawai telah berpenampilan sesuai standar salam dan menjalankannya secara konsisten, terlihat dalam rapat-rapat internal.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Proses Monitoring:</p></div></p></td>
					<td><div class="content"><p>Proses monitoring dilakukan setiap minggu</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Setiap direktorat memiliki PIC masing-masing yg bertugas memonitor standar berpakaian. Apabila ada pegawai yang "tertangkap", mis. memakai sandal di jam kantor, akan difoto dan dipasang di dinding. Selain itu, bagi peg pria disediakan penyewaan dasi.</p></div></td>
				</tr>
				<tr>
					<td colspan=5><div class="title"><p>Program Budaya 5: <b><u>OJK RAPI</u></b></p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nama Program:</p></div></td>
					<td colspan=4><div class="content"><p>Barbekyu (Bareng-bareng Beresin Kyubikel)</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nilai <i>Self Assessment</i>:</p></div></td>
					<td colspan=4><div class="content"><p>6 - Sudah membersihkan meja dan ruangan kerja, mengajak insan OJK lain, dilakukan monitoring secara kreatif dan konsisten</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Attachment:</p></div></td>
					<td colspan=4>
						<a href="https://ojkway.com/admin/form/download_file/8/KlussKCbfFaTw0n" target="_blank" class="btn btn-warning">Download Lampiran</a>
					</td>
				</tr>
				<tr>
					<td colspan=5><div class="subtitle"><p><b>Keterangan:</b></p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Ruangan / Wilayah Kerja:</p></div></p></td>
					<td><div class="content"><p>Meja kerja, ruang kerja, ruang rapat dan ruang publik lainnya sudah terjaga kerapihan dan kebersihannya</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Setiap minggunya PIC dari masing-masing Direktorat telah melakukan sidak terhadap kebersihan dan kerapian tidak hanya meja kerja, tetapi juga ruang rapat dan area kerja sekitar.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Partisipasi Insan OJK:</p></div></p></td>
					<td><div class="content"><p>Seluruh pegawai ikut berpartisipasi, aktif memberikan ide usulan perbaikan dan ikut terlibat dalam proses monitoring</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Hampir seluruh pegawai menunjukkan perubahan signifikan akan kepedulian thd kebersihan dan kerapian kubikel. Sebelum pulang, masing-masing memastikan tidak ada dokumen yang bersifat penting/rahasia yang tercecer di meja, dan memastikan komp tlh mati.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Kreativitas:</p></div></p></td>
					<td><div class="content"><p>Kreativitas digunakan untuk sosialisasi dan monitoring</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Meja yang tidak rapi akan diberikan sign dengan tulisan "POOR", sedangkan meja yang paling rapi akan diberikan sign "GOOD!!"</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Proses Monitoring:</p></div></p></td>
					<td><div class="content"><p>Proses monitoring dilakukan setiap minggu</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Monitoring dilakukan setiap minggu oleh PIC Unit Kerja. Hasil monitoring (foto meja ter-rapi dan ter-berantakan) ditempel di dinding.</p></div></td>
				</tr>
				<tr>
					<td colspan=5><div class="title"><p><b><u>Program Budaya Spesifik</u></b></p></div></td>
				</tr>
				<tr>
					<td colspan=5><div class="subtitle"><p><b><u>Program 1</u></b></p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nama Program:</p></div></td>
					<td colspan=4><div class="content"><p>Kwetiaw (Kaw Ambil, Piti Jangan Lupa Yaw)</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Tujuan Program:</p></div></td>
					<td colspan=4><div class="content"><p>Mengajak pegawai untuk konsisten dalam menerapkan integritas kedalam perilaku sehari-hari</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Target Program:</p></div></td>
					<td colspan=4><div class="content"><p>Seluruh pegawai DSMS</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Deskripsi Monitoring:</p></div></td>
					<td colspan=4><div class="content"><p>Menyediakan aneka snack di lokasi-lokasi tertentu di setiap direktorat beserta money container, dimana tidak ada yang mengawasi pembayaran. Di akhir minggu, PIC melakukan perhitungan jumlah uang yang terkumpul dibandingkan dengan jumlah snack yang tersedi</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nilai <i>Self Assessment</i>:</p></div></td>
					<td colspan=4><div class="content"><p>6 - Telah ada program budaya khusus bertema integritas dan profesionalisme yang dilengkapi dengan tata cara pelaksanaan, proses sosialisasi, sistem monitoring satker, dan sistem evaluasi</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Attachment:</p></div></td>
					<td colspan=4>
						<a href="https://ojkway.com/admin/form/download_file/76/KlussKCbfFaTw0n" target="_blank" class="btn btn-warning">Download Lampiran</a>
					</td>
				</tr>
				<tr>
					<td colspan=5><div class="subtitle"><p><b>Keterangan:</b></p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Sosialisasi:</p></div></p></td>
					<td><div class="content"><p>Sudah disosialisasikan pada seluruh pegawai</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Sudah disosialisasikan dalam rapat koordinasi dan launching budaya DSMS.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Konsistensi:</p></div></p></td>
					<td><div class="content"><p>Sudah dilakukan secara konsisten</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Sudah dilakukan secara konsisten</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Proses Monitoring:</p></div></p></td>
					<td><div class="content"><p>Proses monitoring dilakukan setiap minggu</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Di akhir minggu, PIC melakukan perhitungan jumlah uang yang terkumpul dibandingkan dengan jumlah snack yang tersedia, apakah defisit, sesuai, atau berlebih.</p></div></td>
				</tr>
				<tr>
					<td colspan=5><div class="subtitle"><p><b><u>Program 2</u></b></p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nama Program:</p></div></td>
					<td colspan=4><div class="content"><p>Es Sundae (Everybody Speaks English day on Friday.. eee..)</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Tujuan Program:</p></div></td>
					<td colspan=4><div class="content"><p>Meningkatkan keberanian dan kemampuan pegawai DSMS dalam berbahasa Inggris</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Target Program:</p></div></td>
					<td colspan=4><div class="content"><p>seluruh pegawai DSMS</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Deskripsi Monitoring:</p></div></td>
					<td colspan=4><div class="content"><p>Pada awalnya, program ini direncanakan untuk dilakukan setiap hari Jumat. Namun, karena antusiasme yang tinggi dari para pegawai, atas masukan mereka maka program ini dilakukan setiap hari, dimana mulai pk. 4 sore seluruh pegawai DSMS harus menggunakan ba</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nilai <i>Self Assessment</i>:</p></div></td>
					<td colspan=4><div class="content"><p>6 - Telah ada program budaya khusus bertema integritas dan profesionalisme yang dilengkapi dengan tata cara pelaksanaan, proses sosialisasi, sistem monitoring satker, dan sistem evaluasi</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Attachment:</p></div></td>
					<td colspan=4>
						<a href="https://ojkway.com/admin/form/download_file/77/KlussKCbfFaTw0n" target="_blank" class="btn btn-warning">Download Lampiran</a>
					</td>
				</tr>
				<tr>
					<td colspan=5><div class="subtitle"><p><b>Keterangan:</b></p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Sosialisasi:</p></div></p></td>
					<td><div class="content"><p>Belum disosialisasikan</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Sudah disosialisasikan dalam rapat koordinasi dan launching budaya DSMS, dan dalam setiap kesempatan (mis. morning briefing) disampaikan kembali.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Konsistensi:</p></div></p></td>
					<td><div class="content"><p>Sudah dilakukan secara konsisten</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Dilakukan secara konsisten oleh seluruh pegawai, didorong oleh para pimpinan.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Proses Monitoring:</p></div></p></td>
					<td><div class="content"><p>Proses monitoring dilakukan setiap minggu</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Monitoring dilakukan oleh para PIC program dari masing-masing direktorat, yang bertugas untuk memastikan tidak ada yang menggunakan bahasa Indonesia pada jam tersebut.</p></div></td>
				</tr>
				<tr>
					<td colspan=5><div class="subtitle"><p><b><u>Program 3</u></b></p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nama Program:</p></div></td>
					<td colspan=4><div class="content"><p>Kue Lupis (Kumpul-kumpul Pagi di hari Senin)</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Tujuan Program:</p></div></td>
					<td colspan=4><div class="content"><p>Sebagai </p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Target Program:</p></div></td>
					<td colspan=4><div class="content"><p>seluruh pegawai DSMS</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Deskripsi Monitoring:</p></div></td>
					<td colspan=4><div class="content"><p>Merupakan morning briefing yang dilakukan setiap Senin pagi Pk. 08:00. Diawali dengan doa dan pembacaan nilai-nilai strategis.</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nilai <i>Self Assessment</i>:</p></div></td>
					<td colspan=4><div class="content"><p>6 - Telah ada program budaya khusus bertema integritas dan profesionalisme yang dilengkapi dengan tata cara pelaksanaan, proses sosialisasi, sistem monitoring satker, dan sistem evaluasi</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Attachment:</p></div></td>
					<td colspan=4>
						<a href="https://ojkway.com/admin/form/download_file/197/KlussKCbfFaTw0n" target="_blank" class="btn btn-warning">Download Lampiran</a>
					</td>
				</tr>
				<tr>
					<td colspan=5><div class="subtitle"><p><b>Keterangan:</b></p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Sosialisasi:</p></div></p></td>
					<td><div class="content"><p>Sudah disosialisasikan pada seluruh pegawai</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Sudah disosialisasikan dan dilaksanakan secara rutin.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Konsistensi:</p></div></p></td>
					<td><div class="content"><p>Sudah dilakukan secara konsisten</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Dilaksanakan setiap Senin pk. 08:00 pagi.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Proses Monitoring:</p></div></p></td>
					<td><div class="content"><p>Proses monitoring dilakukan setiap minggu</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Morning briefing ini dipimpin secara bergiliran oleh pegawai DSMS.</p></div></td>
				</tr>
				<tr>
					<td colspan=5><div class="title"><p><b><u>PERAN PIMPINAN</u></b></p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nilai <i>Self Assessment</i>:</p></div></td>
					<td colspan=4><div class="content"><p>6 - Sebagian besar pejabat (50%&gt;) aktif terlibat program budaya, mendukung program, dan Kepala Departemen/Kepala KR/Kepala KO pernah memimpin rapat program budaya serta menjadi role model</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Attachment:</p></div></td>
					<td colspan=4>
						<a href="https://ojkway.com/admin/form/download_file/6/KlussKCbfFaTw0n" target="_blank" class="btn btn-warning">Download Lampiran</a>
					</td>
				</tr>
				<tr>
					<td colspan=5><div class="subtitle"><p><b>Keterangan:</b></p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Role Model:</p></div></p></td>
					<td><div class="content"><p>Sudah menjadi role model dan penggerak</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Seluruh pimpinan menjadi role model dalam menginternalisasi seluruh nilai-nilai OJK dalam kesehariannya.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Keterlibatan Pimpinan:</p></div></p></td>
					<td><div class="content"><p>Sudah terlibat secara aktif</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Seluruh pimpinan mendukung dan terlibat aktif, baik dalam memberi masukan terhadap program-program budaya yang ada, maupun dalam melaksanakannya.</p></div></td>
				</tr>
				<tr>
					<td colspan=5><div class="title"><p><b><u>PARTISIPASI DIREKTORAT</u></b></p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nilai <i>Self Assessment</i>:</p></div></td>
					<td colspan=4><div class="content"><p>6 - Seluruh direktorat (100%) aktif terlibat program budaya, kreatif& konsisten, mendorong capaian kinerja</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Attachment:</p></div></td>
					<td colspan=4>
						<a href="https://ojkway.com/admin/form/download_file/7/KlussKCbfFaTw0n" target="_blank" class="btn btn-warning">Download Lampiran</a>
					</td>
				</tr>
				<tr>
					<td colspan=5><div class="subtitle"><p><b>Keterangan:</b></p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Konsistensi:</p></div></p></td>
					<td><div class="content"><p>Sudah dilakukan secara konsisten</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Seluruh direktorat menyambut dan menjalankan program-program budaya dengan antusias. Cth bila sblmnya PIC BISKUIT harus mencari-cari pegawai yg mau menjadi narasumber acara selanjutnya, sekarang lebih banyak pegawai yang berinisiatif menjadi narsum.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Proses Monitoring:</p></div></p></td>
					<td><div class="content"><p>Proses monitoring dilakukan setiap minggu</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Agar proses monitoring berjalan dengan efektif, setiap program budaya memiliki PIC yang tersebar pada ketiga direktorat. Frekuensi pelaksanaan monitoring dilakukan bdsrkan program. Cth monitoring Es Sundae dilakukan setiap hr, Barbekyu setiap minggu.</p></div></td>
				</tr>
				<tr>
					<td colspan=5><div class="title"><p><b><u>EFEKTIVITAS MONITORING PELAKSANAAN PROGRAM</u></b></p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nilai <i>Self Assessment</i>:</p></div></td>
					<td colspan=4><div class="content"><p>4 - Efektivitas monitoring 50% dari yang direncanakan</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Attachment:</p></div></td>
					<td colspan=4>
						<a href="https://ojkway.com/admin/form/download_file/10/KlussKCbfFaTw0n" target="_blank" class="btn btn-warning">Download Lampiran</a>
					</td>
				</tr>
				<tr>
					<td colspan=5><div class="subtitle"><p><b>Keterangan:</b></p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Pengembangan:</p></div></p></td>
					<td><div class="content"><p>Adanya tindak lanjut dari hasil monitoring</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Untuk program yang berdasarkan hasil monitoring periode sebelumnya kurang memuaskan, akan diangkat pada morning briefing mingguan utk mendapatkan perhatian yg lebih dari seluruh pegawai, utk lbh ditingkatkan pelaksanaannya.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Responden:</p></div></p></td>
					<td><div class="content"><p>Monitor dilakukan di bawah jumlah minimum responden</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Dikarenakan monitoring dilakukan oleh para PIC yang tersebar di 3 direktorat, maka otomatis hampir seluruh pegawai DSMS menjadi objek monitoring.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Metodologi:</p></div></p></td>
					<td><div class="content"><p>Tidak ada metodologi yang digunakan dalam melakukan monitoring</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Masing-masing PIC memiliki metodologi sendiri dalam melakukan monitoring, dimana monitoring dilakukan dengan cara-cara yang fun.</p></div></td>
				</tr>
				<tr>
					<td colspan=5><div class="title"><p><b><u>KREATIVITAS DAN EFEKTIVITAS PENGGUNAAN MEDIA KAMPANYE</u></b></p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Nilai <i>Self Assessment</i>:</p></div></td>
					<td colspan=4><div class="content"><p>6 - Menggunakan &gt;= 5 variasi media kampanye</p></div></td>
				</tr>
				<tr>
					<td valign="bottom"><div class="label"><p>Attachment:</p></div></td>
					<td colspan=4>
						<a href="https://ojkway.com/admin/form/download_file/9/KlussKCbfFaTw0n" target="_blank" class="btn btn-warning">Download Lampiran</a>
					</td>
				</tr>
				<tr>
					<td colspan=5><div class="subtitle"><p><b>Keterangan:</b></p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Pembaruan:</p></div></p></td>
					<td><div class="content"><p>Satker melakukan pembaruan informasi di dalam media kampanye</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Media kampanye yang digunakan antara lain: backdrop, standing banners, poster, bunting flags, e-mail blast, WA group, sticker, dll.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Konsistensi:</p></div></p></td>
					<td><div class="content"><p>Konsisten dalam memanfaatkan media kampanye</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Dari seluruh program budaya yang dimiliki oleh DSMS ada program-program yang sifatnya dijalankan secara mingguan, bahkan setiap hari (cth: Es Sundae), maka media kampanye digunakan dan di-update secara konsisten.</p></div></td>
				</tr>
				<tr>
					<td><p style="margin:2px;"><div class="label"><p>Tingkat Kesadaran:</p></div></p></td>
					<td><div class="content"><p>Pegawai menyadari eksistensi media kampanye yang digunakan</p></div></td>
					<td>&nbsp;</td>
					<td><div class="label"><p>Penjelasan:</p></div></td>
					<td><div class="content"><p>Seluruh media kampanye dibuat "catchy", sehingga seluruh pegawai DSMS akan menyadari eksistensi media yang digunakan.</p></div></td>
				</tr>
				<tr>
					<td colspan=2 align="center">
						<div id="chart_div1"></div>
						<div id="chart_div_hidden" style="display:none;"></div>
					</td>
					<td>&nbsp;</td>
					<td colspan=2 align="center">
						<div id="chart_div2" style="height:220px"></div>
					</td>
				</tr>
				<tr>
					<td colspan=5 align="center">
						<form method="post" action="https://ojkway.com/admin/form/print_report_summary/KlussKCbfFaTw0n" id='savePDFForm'>
							<!--<form method="post" action="https://ojkway.com/admin/form/print_summary" id='savePDFForm'>-->
							<input type='hidden' id='htmlContentHidden' name='htmlContent' value=''>
							<input type='hidden' id='htmlContentHidden2' name='htmlContent2' value=''>
							<input type='button' class="btn btn-default" id="downloadCDBtn" value='Cetak Konsep Catatan Dinas'>
							<input type='button' class="btn btn-primary" id="downloadBtn" value='Cetak PDF Lembar Monitoring'>
						</form>
						<!--<button type="button" onclick="window.open(https://ojkway.com/admin/form/print_report_summary/KlussKCbfFaTw0n)">Print Now!</button>-->
					</td>
				</tr>
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
@endsection