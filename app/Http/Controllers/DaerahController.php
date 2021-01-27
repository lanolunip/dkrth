<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Daerah;
use App\KategoriDaerah;

class DaerahController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$daerah = Daerah::orderBy('id', 'desc')->paginate(10);
    	return view('daerah.daerah_management', ['daerah' => $daerah]);
    }

    public function tambah()
    {
        $kategori_daerah = KategoriDaerah::all();
    	return view('daerah.daerah_tambah',['kategori_daerah' => $kategori_daerah]);
    }
 
    public function store(Request $request)
    {
    	$this->validate($request,[
            'nama' => 'required|string|max:255',
            'kategori_daerah' => 'required',
            
    	]);
 
        Daerah::create([
            'nama' => $request->nama,
            'kategori_daerah' => $request->kategori_daerah,
    	]);
 
    	return redirect('/daerah');
    }

    public function edit($id)
    {
        $kategori_daerah = KategoriDaerah::all();
        $daerah = Daerah::find($id);
        return view('daerah.daerah_edit', ['daerah' => $daerah,'kategori_daerah' => $kategori_daerah]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|string|max:255',
            'kategori_daerah' => 'required',
    	]);
    
        $daerah = Daerah::find($id);
        $daerah->nama = $request->nama;
        $daerah->kategori_daerah = $request->kategori_daerah;
        $daerah->save();
        return redirect('/daerah');
    }

    public function delete($id)
    {
        $daerah = Daerah::find($id);
        $daerah->delete();
        return redirect()->back();
    }
}
