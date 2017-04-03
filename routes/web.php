<?php

Route::get('test', 'ReviewController@tes');


Route::post('customlogin', ['as'=> 'customlogin', 'uses' => 'MyCustomController@authenticate']);

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('home');
    }

    return redirect('login');
});

// Route::get('dashboard', [ 'as' => 'dashboard', 'uses' => 'DashboardController@index']);

Route::get('/home', 'HomeController@index');

Route::get('survey', function () {
    return view('survey.index');
});

// Auth::routes();


// Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('home-reviewer', function () {
    return view('home.home-reviewer');
});





Route::get('kontak', function () {
    return view('kontak.index');
});

/*
|--------------------------------------------------------------------------
| SATKER
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['satker']], function () {

    //MANUAL BOOK
    Route::get('manual-pengguna-satker', 'PanduanController@satker');
    Route::get('setting', 'UserController@setting');

    //ASSESSMENT
    Route::get('nilai-self-assessment', function () {
        return view('assesment.nilai');
    });

    Route::get('lembar-self-assessment', 'SelfAssesmentController@lembarassesment');

    // Route::get('edit-self-assessment/{id}', 'SelfAssesmentController@editassesment');

    Route::get('edit-self-assessment/{id}/programbudaya', 'SelfAssesmentController@programbudaya');
    Route::post('proses/programbudaya', 'SelfAssesmentController@prosesprogrambudaya');
    Route::get('edit-self-assessment/{id}/serapan-anggaran', 'SelfAssesmentController@serapananggaran');
    Route::get('edit-self-assessment/{id}/partisipasi-pimpinan', 'SelfAssesmentController@pimpinan');
    Route::post('edit-self-assessment/{id}/partisipasi-pimpinan', 'SelfAssesmentController@pimpinanSimpan');
    Route::get('edit-self-assessment/{id}/kecepatan-pelaporan', 'SelfAssesmentController@pelaporan');
    Route::post('edit-self-assessment/{id}/kecepatan-pelaporan', 'SelfAssesmentController@pelaporanSimpan');

    Route::post('user/edit/proses/{id}', 'UserController@edit');
    Route::get('arsip/assessment', 'SelfAssesmentController@arsipassesment');

    Route::get('detail/assessment', function () {
        return view('assesment.detail-assessment');
    });
    //ASSESSMENT TUTUP

    //OJK INOVATIF
    Route::get('inovatif', function () {
        return view('inovatif.index');
    });
    Route::get('tambah/inovatif', function () {
        $triwulan = cekCurrentTriwulan();
        $iku = \App\Iku::where('satker','=',Auth::user()->id)
        ->where('tahun','=',date('Y'))
        ->where('daftarindikator_id','=','3')
        ->where('programbudaya_id','=','3')
        ->where('inovatif_triwulan',$triwulan['current']['triwulan'])
        ->first();

        if (count($iku) > 0) {
            return view('inovatif.ubah', compact('iku'));
        }else{
          return view('inovatif.tambah');
        }
    });
    // Route::get('ubah/inovatif', function () {
        // return view('inovatif.ubah');
    // });
    Route::get('arsip/inovatif', ['as' => 'arsip.inovatif.index', 'uses' => 'ArsipController@arsipInovatifIndex']);
    Route::get('detail/inovatif', function () {
        return view('inovatif.detail-inovatif');
    });
    Route::post('proses/tambah/inovatif', 'InovatifController@tambah');
    //TUTUP OJK INOVATIF

    //MONITORING
    Route::get('monitoring-anggaran', ['as' => 'monitoring-anggaran.index', 'uses' => 'AnggaranController@index']);

    Route::get('ubah-anggaran', ['as' => 'monitoring-anggaran.ubah', 'uses' => 'AnggaranController@ubah']);
    Route::post('ubah-anggaran-total', ['as' => 'monitoring-anggaran.ubah.total', 'uses' => 'AnggaranController@ubahTotal']);
    Route::post('ubah-anggaran', ['as' => 'ubah-anggaran', 'uses' => 'AnggaranController@ubahAnggaran']);
    Route::post('edit-self-assessment/{id}/serapan-anggaran', 'AnggaranController@submit');

    Route::get('lihat-anggaran', function () {
        return view('monitoring.lihat');
    });
    //TUTUP MONITORING

    //Hapus Monitoring
    Route::post('hapusStakeHolder', ['as' => 'hapus-stake-holder', 'uses' => 'StakeHolderController@hapus']);
});


/*
|--------------------------------------------------------------------------
| REVIEWER
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['reviewer']], function () {

    //INPUT TAMBAHAN
    Route::get('lomba-kreasi-kreatif', 'InputTambahanController@lomba');
    Route::get('budaya-internal','InputTambahanController@budayainternal');
    Route::get('budaya-eksternal','InputTambahanController@budayaeksternal');
    Route::get('tambah/lomba/{id}','InputTambahanController@tambahlomba');
    Route::get('tambah/budaya-eksternal/{id}','InputTambahanController@tambahbudayaeksternal');
    Route::get('tambah/budaya-internal/{id}','InputTambahanController@tambahbudayainternal');
    Route::post('proses-lomba/{id}','InputTambahanController@proseslomba');
    Route::post('proses-internal','InputTambahanController@prosesinternal');
    Route::post('proses-eksternal','InputTambahanController@proseseksternal');
    //TUTUP INPUT TAMBAHAN

    Route::get('rekap-assessment', function () {
        return view('assesment.rekap');
    });
    Route::get('hasil-assessment', ['as' => 'hasil-assessment', 'uses' => 'ReviewController@hasilAssesment']);
    Route::get('rekap-budaya', function () {
        return view('assesment.rekap-budaya');
    });

    Route::get('rekap-monitoring', function () {
        return view('monitoring.rekap');
    });
    Route::get('hasil-monitoring', function () {
        return view('monitoring.hasil');
    });
    Route::get('anggaran-budaya', function () {
        return view('monitoring.anggaran-budaya');
    });


    //Revisi
    Route::post('revisicp/{hashid}', ['as' => 'reviewcp', 'uses' => 'ReviewController@reviewPost']);
    
    //MANUAL BOOK
    Route::get('manual-pengguna-reviewer', 'PanduanController@reviewer');

    Route::get('lihathasil-monitoring', 'MonitoringController@hasilmonitoring');
    Route::get('detail-monitoring/{hashid}','MonitoringController@detailmonitoring');
    Route::get('tambah-monitoring/{hashid}', 'MonitoringController@tambahmonitoring');
    Route::get('wizard-monitoring/{hashid}','MonitoringController@wizardmonitoring');
    Route::post('proses-wizard/{hashid}','MonitoringController@proseswizard');
    Route::post('proses-tambah-monitoring/{hashid}', 'MonitoringController@prosestambahmonitoring');

    //Grafik
    Route::get('grafik-budaya', ['as' => 'grafik.satker', 'uses' => 'ReviewController@grafik']);
});
/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['admin']], function () {

    Route::get('admin/pengaturan',            ['as' => 'pengaturan.index',   'uses' => 'PengaturanController@index']);
    Route::get('persentase/detail/{hashid}',  ['as' => 'persentase.detail',  'uses' => 'PengaturanController@getPersentaseAjax']);
    Route::get('persentase/detail3/{hashid}', ['as' => 'persentase.detail3', 'uses' => 'PengaturanController@getPersentaseAjax3']);

    Route::post('persentaseEdit1', ['as' => 'persentaseEdit1', 'uses' => 'PengaturanController@persentaseEdit1']);
    Route::post('persentaseEdit2', ['as' => 'persentaseEdit2', 'uses' => 'PengaturanController@persentaseEdit2']);
    Route::post('persentaseEdit4', ['as' => 'persentaseEdit4', 'uses' => 'PengaturanController@persentaseEdit4']);
    Route::post('persentaseEdit5', ['as' => 'persentaseEdit5', 'uses' => 'PengaturanController@persentaseEdit5']);
    Route::post('persentaseEdit6', ['as' => 'persentaseEdit6', 'uses' => 'PengaturanController@persentaseEdit6']);
    Route::post('persentaseEdit7', ['as' => 'persentaseEdit7', 'uses' => 'PengaturanController@persentaseEdit7']);

    Route::post('persentaseEdit3_1', ['as' => 'persentaseEdit3_1', 'uses' => 'PengaturanController@persentaseEdit3_1']);
    Route::post('persentaseEdit3_2', ['as' => 'persentaseEdit3_2', 'uses' => 'PengaturanController@persentaseEdit3_2']);
    Route::post('persentaseEdit3_3', ['as' => 'persentaseEdit3_3', 'uses' => 'PengaturanController@persentaseEdit3_3']);

    // Route::post('ikuBaru1', ['as' => 'iku.baru1', 'uses' => 'PengaturanController@simpanIkuBaru1']);
    // Route::post('ikuEdit1', ['as' => 'iku.edit1', 'uses' => 'PengaturanController@simpanIkuEdit1']);
    // Route::post('ikuBaru2', ['as' => 'iku.baru1', 'uses' => 'PengaturanController@simpanIkuBaru2']);
    // Route::post('ikuEdit2', ['as' => 'iku.edit1', 'uses' => 'PengaturanController@simpanIkuEdit2']);
    // Route::post('ikuBaru4', ['as' => 'iku.baru4', 'uses' => 'PengaturanController@simpanIkuBaru4']);
    // Route::post('ikuEdit4', ['as' => 'iku.edit4', 'uses' => 'PengaturanController@simpanIkuEdit4']);
    // Route::post('ikuBaru5', ['as' => 'iku.baru5', 'uses' => 'PengaturanController@simpanIkuBaru5']);
    // Route::post('ikuEdit5', ['as' => 'iku.edit5', 'uses' => 'PengaturanController@simpanIkuEdit5']);
    // Route::post('ikuBaru6', ['as' => 'iku.baru6', 'uses' => 'PengaturanController@simpanIkuBaru6']);
    // Route::post('ikuEdit6', ['as' => 'iku.edit6', 'uses' => 'PengaturanController@simpanIkuEdit6']);
    // Route::post('ikuBaru7', ['as' => 'iku.baru7', 'uses' => 'PengaturanController@simpanIkuBaru7']);
    // Route::post('ikuEdit7', ['as' => 'iku.edit7', 'uses' => 'PengaturanController@simpanIkuEdit7']);

    // Special
    Route::get('special/tahun/{tahun}/triwulan/{triwulan}/jenis/{jenis}', ['as' => 'special', 'uses' => 'PengaturanController2@special']);
    Route::post('ikuOjkMelayani', ['as' => 'ikuojkmelayani', 'uses' => 'PengaturanController@simpanOjkMelayani']);
    Route::post('ikuOjkPeduli', ['as' => 'ikuojkpeduli', 'uses' => 'PengaturanController@simpanOjkPeduli']);
    Route::post('ikuOjkInovatif', ['as' => 'ikuojkpinovatif', 'uses' => 'PengaturanController@simpanOjkInovatif']);

//  !!
//TODO:cek jika satker mengirimkan assesment yang ikunya belum didefinisikan
//Kalau belum ada, berarti kosong (0)
    //USER
    Route::get('user','UserController@user');
    Route::get('user/tambah', 'UserController@usertambahview');
    Route::get('user/hapus/{id}', 'UserController@hapususer');
    Route::get('user/edit/{id}', 'UserController@editview');
    Route::post('user/tambah/proses', 'UserController@tambahuser');

    //DEPARTEMEN
    Route::get('departemen','DepartemenController@index');
    Route::get('departemen/tambah','DepartemenController@createview');
    Route::post('departemen/tambah/proses','DepartemenController@create');
    Route::get('departemen/hapus/{id}','DepartemenController@hapus');
    Route::get('departemen/edit/{id}','DepartemenController@editview');
    Route::post('departemen/edit/proses/{id}','DepartemenController@edit');

    //DIREKTORAT
    Route::get('direktorat', 'DirektoratController@index');
    Route::get('direktorat/tambah', 'DirektoratController@createview');
    Route::post('direktorat/tambah/proses','DirektoratController@create');
    Route::get('direktorat/hapus/{id}','DirektoratController@hapus');
    Route::get('direktorat/edit/{id}','DirektoratController@editview');
    Route::post('direktorat/edit/proses/{id}','DirektoratController@edit');


    
    Route::get('deputi-komisioner', 'KomisionerController@index');
    Route::get('komisioner/tambah', 'KomisionerController@createview') ;
    Route::post('komisioner/tambah/proses', 'KomisionerController@create') ;
    Route::get('komisioner/hapus/{id}','KomisionerController@hapus');
    Route::get('komisioner/edit/{id}','KomisionerController@editview');
    Route::post('komisioner/edit/proses/{id}','KomisionerController@edit');

    //KECEPATAN LAPORAN
    Route::get('cek-simpan-pelaporan', 'SelfAssesmentController@cekSimpanPelaporan');

    //Serapan Anggaran
    Route::get('cek-serapan-anggaran', 'SelfAssesmentController@cekSerapanAnggaran');

    //MAPPING
    Route::get('map-report', 'MappingController@report');
    Route::get('report/tambah', 'MappingController@tambah_mapping');
    Route::post('proses/mapping/tambah', 'MappingController@proses_tambah_mapping');
    Route::get('edit/mapping/{id}', 'MappingController@editmapping');
    Route::post('edit/mapping/proses/{id}', 'MappingController@proseseditmapping');
    Route::get('hapus-maping/{id}', 'MappingController@hapus');
    Route::get('mapping-detail/{id}', 'MappingController@detailnya');
    Route::get('mapping-satker/add/{id}', 'MappingController@addsatkernya');
    Route::post('mapping-satker/add/{id}', 'MappingController@prosesaddsatkernya');
    Route::post('mapping-satker/delete', 'MappingController@prosesdeletesatkernya');

    //MANUAL PENGGUNA
    Route::get('upload/satker','PanduanController@uploadsatkerview');
    Route::get('upload/dmpb', 'PanduanController@uploadreviewer');
    Route::get('upload/catatan-dinas', 'PanduanController@uploaddinas');
    Route::post('upload/manual-book/proses', 'PanduanController@uploadpost');

    // HIRARKI
    Route::get('hirarki', ['as' => 'hirarki.index', 'uses' => 'HirarkiController@index']);
});


Route::group(['middleware' => ['auth']], function()
{
    //Download
    Route::get('attachment/lampiran_anggaran/{filename}', ['as' => 'download.lampiran', 'uses' => 'LampiranController@downloadLampiranAnggaran']);
    Route::get('attachment/lampiran_program_budaya/{filename}', ['as' => 'download.lampiran', 'uses' => 'LampiranController@downloadLampiranProgramBudaya']);
    Route::get('attachment/lampiran_monitoring/{filename}', ['as' => 'download.lampiran', 'uses' => 'LampiranController@downloadLampiranReviewerMelayani']);

    //Lihat Hasil Laporan
    Route::get('lihathasilassesment/{hashid}', ['as' => 'reviewcp', 'uses' => 'ReviewController@lihatGet']);
    
    //Ringkasan SelfAssesment
    Route::get('ringkasan-sa/{hashid}', ['as' => 'reviewcp', 'uses' => 'ReviewController@cetakRingkasan']);
});


//TOKEN
Route::get('auth/verify', ['as' => 'auth/verify', 'uses' => 'TokenController@verify']);
Route::get('auth/gen', ['as' => 'auth/gen', 'uses' => 'TokenController@gen']);

