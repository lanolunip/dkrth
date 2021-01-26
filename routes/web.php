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
    return view('welcome');
});

Auth::routes(['register' => true]);

#home
Route::get('/home', 'HomeController@index')->name('home');

#Mengatur Petugas
Route::get('/petugas', 'PetugasController@index');
Route::get('/petugas/tambah', 'PetugasController@tambah');
Route::post('/petugas/store', 'PetugasController@store');
Route::get('/petugas/edit/{id}', 'PetugasController@edit');
Route::put('/petugas/update/{id}', 'PetugasController@update');
Route::get('/petugas/hapus/{id}', 'PetugasController@delete');

#mengatur Daerah
Route::get('/daerah', 'DaerahController@index');
Route::get('/daerah/tambah', 'DaerahController@tambah');
Route::post('/daerah/store', 'DaerahController@store');
Route::get('/daerah/edit/{id}', 'DaerahController@edit');
Route::put('/daerah/update/{id}', 'DaerahController@update');
Route::get('/daerah/hapus/{id}', 'DaerahController@delete');

#mengatur Tim
Route::get('/tim', 'TimController@index');
Route::get('/tim/tambah', 'TimController@tambah');
Route::post('/tim/store', 'TimController@store');
Route::get('/tim/edit/{id}', 'TimController@edit');
Route::put('/tim/update/{id}', 'TimController@update');
Route::get('/tim/hapus/{id}', 'TimController@delete');

#mengatur Penugasan
Route::get('/penugasan', 'PenugasanController@index');
Route::get('/penugasan/tambah', 'PenugasanController@tambah');
Route::post('/penugasan/store', 'PenugasanController@store');
Route::get('/penugasan/edit/{id}', 'PenugasanController@edit');
Route::put('/penugasan/update/{id}', 'PenugasanController@update');
Route::get('/penugasan/hapus/{id}', 'PenugasanController@delete');
Route::get('/penugasan/laporan/{id}', 'PenugasanController@laporan');
Route::put('/penugasan/selesaikan/{id}', 'PenugasanController@selesaikan');

#mengatur Laporan
Route::get('/laporan', 'LaporanController@index');
Route::get('/laporan/edit/{id}', 'LaporanController@edit');
Route::put('/laporan/update/{id}', 'LaporanController@update');
Route::get('/laporan/hapus/{id}', 'LaporanController@delete');

#mengatur Pelaporan -- Bagian Pelapor saja
Route::get('/pelaporan', 'PelaporanController@index');
Route::get('/pelaporan/tambah', 'PelaporanController@tambah');
Route::post('/pelaporan/store', 'PelaporanController@store');

#Mengatur Pelaporan -- Bagian Admin
Route::get('/pelaporan/edit/{id}', 'PelaporanController@edit');
Route::put('/pelaporan/update/{id}', 'PelaporanController@update');
Route::get('/pelaporan/hapus/{id}', 'PelaporanController@delete');
Route::get('/pelaporan/buat_penugasan/{id}', 'PelaporanController@buat_penugasan');
Route::post('/pelaporan/selesai_buat_penugasan/{id_pelaporan}', 'PelaporanController@selesai_buat_penugasan');

#Mengatur Keuangan
Route::get('/keuangan', 'KeuanganController@index');
Route::get('/keuangan/hitung', 'KeuanganController@hitung');


