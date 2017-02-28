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
Route::get('arsip/assessment', function () {
    return view('assesment.arsip');
});
Route::get('rekap-assessment', function () {
    return view('assesment.rekap');
});
Route::get('hasil-assessment', function () {
    return view('assesment.hasil');
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

//ANGGARAN
Route::get('monitoring-anggaran', function () {
    return view('anggaran.monitoring');
});
//TUTUP ANGGARAN


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


    //USER
    Route::get('user', function () {
        return view('user.user');
    });
    Route::get('user/tambah', function () {
        return view('user.tambah-user');
    });

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
