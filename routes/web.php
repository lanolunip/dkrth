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
Route::get('/petugas', 'PetugasController@index')->middleware('role:Ketua');
Route::get('/petugas/tambah', 'PetugasController@tambah')->middleware('role:Ketua');
Route::post('/petugas/store', 'PetugasController@store')->middleware('role:Ketua');
Route::get('/petugas/edit/{id}', 'PetugasController@edit')->middleware('role:Ketua');
Route::put('/petugas/update/{id}', 'PetugasController@update')->middleware('role:Ketua');
Route::get('/petugas/hapus/{id}', 'PetugasController@delete')->middleware('role:Ketua');

#mengatur Daerah
Route::get('/daerah', 'DaerahController@index')->middleware('role:Ketua');
Route::get('/daerah/tambah', 'DaerahController@tambah')->middleware('role:Ketua');
Route::post('/daerah/store', 'DaerahController@store')->middleware('role:Ketua');
Route::get('/daerah/edit/{id}', 'DaerahController@edit')->middleware('role:Ketua');
Route::put('/daerah/update/{id}', 'DaerahController@update')->middleware('role:Ketua');
Route::get('/daerah/hapus/{id}', 'DaerahController@delete')->middleware('role:Ketua');

#mengatur Tim
Route::get('/tim', 'TimController@index')->middleware('role:Ketua');
Route::get('/tim/view/{id}', 'TimController@view')->middleware('role:Ketua,Petugas,Pelapor');
Route::get('/tim/tambah', 'TimController@tambah')->middleware('role:Ketua');
Route::post('/tim/store', 'TimController@store')->middleware('role:Ketua');
Route::get('/tim/edit/{id}', 'TimController@edit')->middleware('role:Ketua');
Route::put('/tim/update/{id}', 'TimController@update')->middleware('role:Ketua');
Route::get('/tim/hapus/{id}', 'TimController@delete')->middleware('role:Ketua');

#mengatur Penugasan
Route::get('/penugasan', 'PenugasanController@index')->middleware('role:Ketua,Petugas');
Route::get('/penugasan/view/{id}', 'PenugasanController@view')->middleware('role:Ketua,Petugas,Pelapor');
Route::get('/penugasan/tambah', 'PenugasanController@tambah')->middleware('role:Ketua');
Route::post('/penugasan/store', 'PenugasanController@store')->middleware('role:Ketua');
// Route::get('/penugasan/edit/{id}', 'PenugasanController@edit')->middleware('role:Ketua');
Route::put('/penugasan/update/{id}', 'PenugasanController@update')->middleware('role:Ketua');
Route::get('/penugasan/hapus/{id}', 'PenugasanController@delete')->middleware('role:Ketua');
Route::get('/penugasan/laporan/{id}', 'PenugasanController@laporan')->middleware('role:Ketua,Petugas');
Route::put('/penugasan/selesaikan/{id}', 'PenugasanController@selesaikan')->middleware('role:Ketua,Petugas');

#Mengatur Penugasan Rotasi
Route::get('/penugasan/rotasi', 'PenugasanController@index_rotasi')->middleware('role:Ketua');
Route::get('/penugasan/rotasi/buat_penugasan/{id}', 'PenugasanController@tambah_rotasi')->middleware('role:Ketua');
Route::post('/penugasan/rotasi/store', 'PenugasanController@store_rotasi')->middleware('role:Ketua');

#mengatur Laporan
Route::get('/laporan', 'LaporanController@index')->middleware('role:Ketua,Petugas');
Route::get('/laporan/view/{id}', 'LaporanController@view')->middleware('role:Ketua,Petugas,Pelapor');
Route::get('/laporan/edit/{id}', 'LaporanController@edit')->middleware('role:Ketua');
Route::put('/laporan/update/{id}', 'LaporanController@update')->middleware('role:Ketua');
Route::get('/laporan/hapus/{id}', 'LaporanController@delete')->middleware('role:Ketua');

#mengatur Pelaporan -- Bagian Pelapor saja
Route::get('/pelaporan', 'PelaporanController@index')->middleware('role:Ketua,Pelapor');
Route::get('/pelaporan/tambah/{id}', 'PelaporanController@tambah')->middleware('role:Ketua,Pelapor');
Route::get('/pelaporan/tipe_kategori_pelaporan', 'PelaporanController@tipe_kategori_pelaporan')->middleware('role:Ketua,Pelapor');
Route::get('/pelaporan/kategori_pelaporan/{id}', 'PelaporanController@kategori_pelaporan')->middleware('role:Ketua,Pelapor');
Route::post('/pelaporan/store', 'PelaporanController@store')->middleware('role:Ketua,Pelapor');

#Mengatur Pelaporan -- Bagian Admin
Route::get('/pelaporan/edit/{id}', 'PelaporanController@edit')->middleware('role:Ketua,Pelapor');
Route::put('/pelaporan/update/{id}', 'PelaporanController@update')->middleware('role:Ketua,Pelapor');
Route::get('/pelaporan/hapus/{id}', 'PelaporanController@delete')->middleware('role:Ketua');
Route::get('/pelaporan/tolak/{id}', 'PelaporanController@tolak')->middleware('role:Ketua');
Route::get('/pelaporan/buat_penugasan/{id}', 'PelaporanController@buat_penugasan')->middleware('role:Ketua');
Route::post('/pelaporan/selesai_buat_penugasan/{id_pelaporan}', 'PelaporanController@selesai_buat_penugasan')->middleware('role:Ketua');

#Mengatur Keuangan
Route::get('/keuangan', 'KeuanganController@index')->middleware('role:Ketua');
Route::get('/keuangan/hitung', 'KeuanganController@hitung')->middleware('role:Ketua');

#Mengatur Tipe Kategori Pelaporan
Route::get('/tipe_kategori_pelaporan', 'TipeKategoriPelaporanController@index')->middleware('role:Ketua');
Route::get('/tipe_kategori_pelaporan/tambah', 'TipeKategoriPelaporanController@tambah')->middleware('role:Ketua');
Route::post('/tipe_kategori_pelaporan/store', 'TipeKategoriPelaporanController@store')->middleware('role:Ketua');
Route::get('/tipe_kategori_pelaporan/edit/{id}', 'TipeKategoriPelaporanController@edit')->middleware('role:Ketua');
Route::put('/tipe_kategori_pelaporan/update/{id}', 'TipeKategoriPelaporanController@update')->middleware('role:Ketua');
Route::get('/tipe_kategori_pelaporan/hapus/{id}', 'TipeKategoriPelaporanController@delete')->middleware('role:Ketua');

#Mengatur Kategori Pelaporan
Route::get('/kategori_pelaporan', 'KategoriPelaporanController@index')->middleware('role:Ketua');
Route::get('/kategori_pelaporan/tambah', 'KategoriPelaporanController@tambah')->middleware('role:Ketua');
Route::post('/kategori_pelaporan/store', 'KategoriPelaporanController@store')->middleware('role:Ketua');
Route::get('/kategori_pelaporan/edit/{id}', 'KategoriPelaporanController@edit')->middleware('role:Ketua');
Route::put('/kategori_pelaporan/update/{id}', 'KategoriPelaporanController@update')->middleware('role:Ketua');
Route::get('/kategori_pelaporan/hapus/{id}', 'KategoriPelaporanController@delete')->middleware('role:Ketua');