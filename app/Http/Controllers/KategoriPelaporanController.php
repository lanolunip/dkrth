<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriPelaporan;
use App\TipeKategoriPelaporan;

class KategoriPelaporanController extends Controller
{
    public function index()
    {
    	$kategori_pelaporan = KategoriPelaporan::orderBy('id', 'desc')->paginate(10);
    	return view('kategori_pelaporan.kategori_pelaporan_management', ['kategori_pelaporan' => $kategori_pelaporan]);
    }

    public function tambah()
    {
        $tipe_kategori_pelaporan = TipeKategoriPelaporan::all();
    	return view('kategori_pelaporan.kategori_pelaporan_tambah',['tipe_kategori_pelaporan' => $tipe_kategori_pelaporan]);
    }
 
    public function store(Request $request)
    {
    	$this->validate($request,[
            'nama' => 'required|string|max:255',
            'tipe_kategori_pelaporan' => 'required',
            
    	]);
 
        KategoriPelaporan::create([
            'nama' => $request->nama,
            'tipe_kategori_pelaporan' => $request->tipe_kategori_pelaporan,
    	]);
 
    	return redirect('/kategori_pelaporan')->with('pesan', 'Berhasil Menambahkan Kategori Pelaporan Baru !');
    }

    public function edit($id)
    {
        $tipe_kategori_pelaporan = TipeKategoriPelaporan::all();
        $kategori_pelaporan = KategoriPelaporan::find($id);
        return view('kategori_pelaporan.kategori_pelaporan_edit', ['kategori_pelaporan' => $kategori_pelaporan,'tipe_kategori_pelaporan' => $tipe_kategori_pelaporan]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|string|max:255',
            'tipe_kategori_pelaporan' => 'required',
    	]);
    
        $kategori_pelaporan = KategoriPelaporan::find($id);
        $kategori_pelaporan->nama = $request->nama;
        $kategori_pelaporan->tipe_kategori_pelaporan = $request->tipe_kategori_pelaporan;
        $kategori_pelaporan->save();
        return redirect('/kategori_pelaporan')->with('pesan', 'Berhasil Mengubah Data Kategori Pelaporan !');
    }

    public function delete($id)
    {
        $daerah = KategoriPelaporan::find($id);
        $daerah->delete();
        return redirect()->back()->with('pesan', 'Berhasil Menghapus Kategori Pelaporan !');
    }
}
