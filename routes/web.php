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

Route::get('nilai-self-assesment', function () {
    return view('assesment.nilai');
});
Route::get('lembar-self-assesment', function () {
    return view('assesment.lembar');
});
Route::get('program-budaya', function () {
    return view('budaya.index');
});
Route::get('monitoring-anggaran', function () {
    return view('anggaran.monitoring');
});
Route::get('stakeholder', function () {
    return view('stakeholder.index');
});
Route::get('manual-pengguna', function () {
    return view('panduan.index');
});
Route::get('kontak', function () {
    return view('kontak.index');
});
