<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipeKategoriPelaporan;

class TipeKategoriPelaporanController extends Controller
{
    public function index()
    {
    	$tipe_kategori_pelaporan = TipeKategoriPelaporan::orderBy('id', 'desc')->paginate(10);
    	return view('tipe_kategori_pelaporan.tipe_kategori_pelaporan_management', ['tipe_kategori_pelaporan' => $tipe_kategori_pelaporan]);
    }

    public function tambah()
    {
        $tipe_kategori_pelaporan = TipeKategoriPelaporan::all();
    	return view('tipe_kategori_pelaporan.tipe_kategori_pelaporan_tambah',['tipe_kategori_pelaporan' => $tipe_kategori_pelaporan]);
    }
 
    public function store(Request $request)
    {
    	$this->validate($request,[
            'nama' => 'required|string|max:255',
            
    	]);
 
        TipeKategoriPelaporan::create([
            'nama' => $request->nama,
    	]);
 
    	return redirect('/tipe_kategori_pelaporan')->with('pesan', 'Berhasil Menambahkan Tipe Kategori Pelaporan Baru !');
    }

    public function edit($id)
    {
        $tipe_kategori_pelaporan = TipeKategoriPelaporan::find($id);
        return view('tipe_kategori_pelaporan.tipe_kategori_pelaporan_edit', ['tipe_kategori_pelaporan' => $tipe_kategori_pelaporan]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|string|max:255',
    	]);
    
        $tipe_kategori_pelaporan = TipeKategoriPelaporan::find($id);
        $tipe_kategori_pelaporan->nama = $request->nama;
        $tipe_kategori_pelaporan->save();
        return redirect('/tipe_kategori_pelaporan')->with('pesan', 'Berhasil Mengubah Data Tipe Kategori Pelaporan !');
    }

    public function delete($id)
    {
        $tipe_kategori_pelaporan = TipeKategoriPelaporan::find($id);
        $tipe_kategori_pelaporan->delete();
        return redirect()->back()->with('pesan', 'Berhasil Menghapus Tipe Kategori Pelaporan !');
    }
}
