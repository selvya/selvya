<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.home');
});




//ASSESSMENT
Route::get('nilai-self-assessment', function () {
    return view('assesment.nilai');
});
Route::get('lembar-self-assessment', function () {
    return view('assesment.lembar');
});
Route::get('edit-self-assessment', function () {
    return view('assesment.edit-assessment');
});
Route::get('arsip/assessment', function () {
    return view('assesment.arsip');
});
Route::get('rekap-assessment', function () {
    return view('assesment.rekap');
});
Route::get('hasil-assessment', function () {
    return view('assesment.hasil');
});
Route::get('rekap-budaya', function () {
    return view('assesment.rekap-budaya');
});
//ASSESSMENT TUTUP

//OJK INOVATIF
Route::get('inovatif', function () {
    return view('inovatif.index');
});
Route::get('tambah/inovatif', function () {
    return view('inovatif.tambah');
});
Route::get('arsip/inovatif', function () {
    return view('inovatif.arsip');
});
//TUTUP OJK INOVATIF

//MONITORING
Route::get('monitoring-anggaran', function () {
    return view('monitoring.anggaran');
});
Route::get('rekap-monitoring', function () {
    return view('monitoring.rekap');
});
Route::get('hasil-monitoring', function () {
    return view('monitoring.hasil');
});
//TUTUP MONITORING


//MANUAL PENGGUNA
Route::get('manual-pengguna-satker', 'PanduanController@satker');
Route::get('manual-pengguna-reviewer', 'PanduanController@reviewer');
Route::get('upload/satker','PanduanController@uploadsatkerview');
Route::get('upload/dmpb', 'PanduanController@uploadreviewer');
Route::post('upload/manual-book/proses', 'PanduanController@uploadpost');

Route::get('kontak', function () {
    return view('kontak.index');
});

Route::get('map-report', function () {
    return view('report.map-report');
});

Route::get('report/tambah', function () {
    return view('report.tambah');
});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['admin']], function () {

    Route::get('admin/pengaturan',['as' => 'pengaturan.index', 'uses' => 'PengaturanController@index']);
    Route::get('iku/detail/{hashid}', ['as' => 'iku.detail', 'uses' => 'PengaturanController@getIkuAjax']);

    Route::post('ikuBaru1', ['as' => 'iku.baru1', 'uses' => 'PengaturanController@simpanIkuBaru1']);
    Route::post('ikuEdit1', ['as' => 'iku.edit1', 'uses' => 'PengaturanController@simpanIkuEdit1']);
    Route::post('ikuBaru2', ['as' => 'iku.baru1', 'uses' => 'PengaturanController@simpanIkuBaru2']);
    Route::post('ikuEdit2', ['as' => 'iku.edit1', 'uses' => 'PengaturanController@simpanIkuEdit2']);
    Route::post('ikuBaru4', ['as' => 'iku.baru4', 'uses' => 'PengaturanController@simpanIkuBaru4']);
    Route::post('ikuEdit4', ['as' => 'iku.edit4', 'uses' => 'PengaturanController@simpanIkuEdit4']);
    Route::post('ikuBaru5', ['as' => 'iku.baru5', 'uses' => 'PengaturanController@simpanIkuBaru5']);
    Route::post('ikuEdit5', ['as' => 'iku.edit5', 'uses' => 'PengaturanController@simpanIkuEdit5']);
    Route::post('ikuBaru6', ['as' => 'iku.baru6', 'uses' => 'PengaturanController@simpanIkuBaru6']);
    Route::post('ikuEdit6', ['as' => 'iku.edit6', 'uses' => 'PengaturanController@simpanIkuEdit6']);
    Route::post('ikuBaru7', ['as' => 'iku.baru7', 'uses' => 'PengaturanController@simpanIkuBaru7']);
    Route::post('ikuEdit7', ['as' => 'iku.edit7', 'uses' => 'PengaturanController@simpanIkuEdit7']);

    //Special
    Route::get('special/tahun/{tahun}/triwulan/{triwulan}/jenis/{jenis}', ['as' => 'special', 'uses' => 'PengaturanController@special']);
    Route::post('ikuOjkMelayani', ['as' => 'ikuojkmelayani', 'uses' => 'PengaturanController@simpanOjkMelayani']);
    Route::post('ikuOjkPeduli', ['as' => 'ikuojkpeduli', 'uses' => 'PengaturanController@simpanOjkPeduli']);
    Route::post('ikuOjkInovatif', ['as' => 'ikuojkpinovatif', 'uses' => 'PengaturanController@simpanOjkInovatif']);

//  !!
//TODO:cek jika satker mengirimkan assesment yang ikunya belum didefinisikan
//Kalau belum ada, berarti kosong (0)
    //USER
    Route::get('user','UserController@user');
    Route::get('user/tambah', 'UserController@usertambahview');
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
});



Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('survey', function () {
    return view('survey.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
