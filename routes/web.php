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

Route::get('/test',function(){
    return view('test');
});    

Route::get('/', 'HalamanDepanController@index');

Auth::routes(['register' => true,'verify' => true]);

Route::group(['middleware' => 'verified'],function(){
    #home
    Route::get('/home', 'HomeController@index')->name('home');
    
    #Mengatur Petugas
    Route::group(['prefix' => 'petugas','middleware' => 'role:Ketua'],function(){
        $c = 'PetugasController@';
        Route::get('/', $c.'index');
        Route::get('/tambah', $c.'tambah');
        Route::post('/store', $c.'store');
        Route::get('/edit/{id}', $c.'edit');
        Route::put('/update/{id}', $c.'update');
        Route::get('/hapus/{id}', $c.'delete');
    });
    
    #mengatur Daerah
    Route::group(['prefix' => 'daerah' ,'middleware' => 'role:Ketua'],function(){
        $c = 'DaerahController@';
        Route::get('/', $c.'index');
        Route::get('/tambah', $c.'tambah');
        Route::post('/store', $c.'store');
        Route::get('/edit/{id}', $c.'edit');
        Route::put('/update/{id}', $c.'update');
        Route::get('/hapus/{id}', $c.'delete');
    });
    
    
    #mengatur Tim
    Route::group(['prefix' => 'tim'],function(){
        $c = 'TimController@';
        #Ketua
        Route::group(['middleware' => 'role:Ketua'],function() use ($c){
            Route::get('/', $c.'index');
            Route::get('/tambah', $c.'tambah');
            Route::post('/store', $c.'store');
            Route::get('/edit/{id}', $c.'edit');
            Route::put('/update/{id}', $c.'update');
            Route::get('/hapus/{id}', $c.'delete');
        });
        #Semua
        Route::group(['middleware' => 'role:role:Ketua,Petugas,Pelapor'],function() use ($c){
            Route::get('/view/{id}', $c.'view');
        });
    });
    
    #mengatur Penugasan
    Route::group(['prefix' => 'penugasan'],function(){
        $c = 'PenugasanController@';
        #Ketua
        Route::group(['middleware' => 'role:ketua'],function() use ($c){
            #Penugasan Biasa
            // Route::get('/tambah', $c.'tambah');
            // Route::post('/store', $c.'store');
            // Route::get('/edit/{id}', $c.'edit');
            Route::put('/update/{id}', $c.'update');
            Route::get('/hapus/{id}', $c.'delete');
            #Penugasan Rotasi
            Route::get('/rotasi', $c.'index_rotasi');
            Route::get('/rotasi/buat_penugasan/{id}', $c.'tambah_rotasi');
            Route::post('/rotasi/store', $c.'store_rotasi');
            Route::get('/statistik', $c.'statistik');
            Route::get('/statistik/cari', $c.'cari_data');
            Route::get('/statistik/print_pdf', $c.'print_pdf');
            
        });
        #Ketua dan Petugas
        Route::group(['middleware' => 'role:role:Ketua,Petugas'],function() use ($c){
            Route::get('/', $c.'index');
            Route::get('/print_penugasan/{id}', $c.'print_penugasan');
            Route::get('/laporan/{id}', $c.'laporan');
            Route::put('/selesaikan/{id}', $c.'selesaikan');
        });
        #Semua
        Route::group(['middleware' => 'role:role:Ketua,Petugas,Pelapor'],function() use ($c){
            Route::get('/view/{id}', $c.'view');
        });
    });
    
    #mengatur Laporan
    Route::group(['prefix' => 'laporan'],function(){
        $c = 'LaporanController@';
        #ketua
        Route::group(['middleware' => 'role:role:Ketua'],function() use ($c){
            Route::get('/edit/{id}', $c.'edit');
            Route::put('/update/{id}', $c.'update');
            Route::get('/hapus/{id}', $c.'delete');
        });
        #Ketua dan petugas
        Route::group(['middleware' => 'role:role:Ketua,Petugas'],function() use ($c){
            Route::get('/', $c.'index');
        });
        #Ketua petugas pelapor
        Route::group(['middleware' => 'role:role:Ketua,Petugas,Pelapor'],function() use ($c){
            Route::get('/view/{id}', $c.'view');
        });
    });
    
    #mengatur Pelaporan 
    Route::group(['prefix' => 'pelaporan'],function(){
        $c = 'PelaporanController@';
        #ketua
        Route::group(['middleware' => 'role:role:Ketua'],function() use ($c){
            Route::get('/tolak/{id}', $c.'tolak');
            Route::get('/buat_penugasan/{id}', $c.'buat_penugasan');
            Route::post('/selesai_buat_penugasan/{id_pelaporan}', $c.'selesai_buat_penugasan');
            Route::get('/hapus/{id}', $c.'delete');
        });
        #Ketua dan pelapor
        Route::group(['middleware' => 'role:role:Ketua,Pelapor'],function() use ($c){
            Route::get('/', $c.'index');
            Route::get('/tambah/{id}', $c.'tambah');
            Route::get('/tipe_kategori_pelaporan', $c.'tipe_kategori_pelaporan');
            Route::get('/kategori_pelaporan/{id}', $c.'kategori_pelaporan');
            Route::post('/store', $c.'store');
            Route::get('/edit/{id}', $c.'edit');
            Route::put('/update/{id}', $c.'update');
            Route::get('/review/{id}', $c.'buat_review');
            Route::post('/review/selesai/{id}', $c.'selesai_review');
        });
    });
    
    #Mengatur Keuangan
    Route::group(['prefix' => 'keuangan','middleware' => 'role:Ketua'],function(){
        $c = 'KeuanganController@';
        Route::get('/', $c.'index');
        Route::get('/hitung', $c.'hitung');
        Route::get('/print_pdf', $c.'print_pdf');
    });
    
    #Mengatur Tipe Kategori Pelaporan
    Route::group(['prefix' => 'tipe_kategori_pelaporan','middleware' => 'role:Ketua'],function(){
        $c = 'TipeKategoriPelaporanController@';
        Route::get('/', $c.'index');
        Route::get('/tambah', $c.'tambah');
        Route::post('/store', $c.'store');
        Route::get('/edit/{id}', $c.'edit');
        Route::put('/update/{id}', $c.'update');
        Route::get('/hapus/{id}', $c.'delete');
    });
    
    #Mengatur Kategori Pelaporan
    Route::group(['prefix' => 'kategori_pelaporan','middleware' => 'role:Ketua'],function(){
        $c = 'KategoriPelaporanController@';
        Route::get('/', $c.'index');
        Route::get('/tambah', $c.'tambah');
        Route::post('/store', $c.'store');
        Route::get('/edit/{id}', $c.'edit');
        Route::put('/update/{id}', $c.'update');
        Route::get('/hapus/{id}', $c.'delete');
    });
});