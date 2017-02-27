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
Route::get('nilai-self-assesment', function () {
    return view('assesment.nilai');
});
Route::get('lembar-self-assesment', function () {
    return view('assesment.lembar');
});
Route::get('arsip/assessment', function () {
    return view('assesment.arsip');
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


Route::get('manual-pengguna', function () {
    return view('panduan.index');
});

Route::get('upload/satker', function () {
    return view('panduan.upload-panduan-satker');
});
Route::get('upload/dmpb', function () {
    return view('panduan.upload-dmpb');
});

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
    Route::get('admin/pengaturan', function()
    {
       return view('admin.pengaturan');
    });

    //USER
    Route::get('user', function () {
        return view('user.user');
    });
    Route::get('deputi-komisioner', function () {
        return view('user.komisioner');
    });
    Route::get('departemen', function () {
        return view('user.departemen');
    });
    Route::get('direktorat', function () {
        return view('user.direktorat');
    });
    Route::get('user/tambah', function () {
        return view('user.tambah-user');
    });
    Route::get('direktorat/tambah', function () {
        return view('user.tambah-direktorat');
    });
    Route::get('departemen/tambah', function () {
        return view('user.tambah-departemen');
    });
    Route::get('komisioner/tambah', function () {
        return view('user.tambah-komisioner');
    });
});



Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('survey', function () {
    return view('survey.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
