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
Route::get('kontak', function () {
    return view('kontak.index');
});
