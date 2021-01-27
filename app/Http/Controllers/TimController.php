<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tim;
use App\Daerah;
use App\KategoriDaerah;
use App\JenisTim;
use App\Petugas;

class TimController extends Controller
{
    public function index()
    {
    	$tim = Tim::orderBy('id', 'desc')->paginate(10);
    	return view('tim.tim_management', ['tim' => $tim]);
    }

    public function view($id)
    {
    	$jenis_tim = JenisTim::all();
        $kategori_daerah = KategoriDaerah::all();
        $petugas = Petugas::all();
        $tim = Tim::find($id);
        return view('tim.tim_view', ['tim' => $tim,'petugas' => $petugas,'jenis_tim' => $jenis_tim,'kategori_daerah' => $kategori_daerah]);
    }

    public function tambah()
    {
        $jenis_tim = JenisTim::all();
        $kategori_daerah = KategoriDaerah::all();
        $petugas = Petugas::all();
    	return view('tim.tim_tambah',['petugas' => $petugas,'jenis_tim' => $jenis_tim,'kategori_daerah' => $kategori_daerah]);
    }
 
    public function store(Request $request)
    {
    	$this->validate($request,[
            'nama' => 'required|string|max:255',
            'petugas' => 'required',
            'jenis_tim' => 'required',
            'kategori_daerah' => 'required',
            
    	]);
 
        Tim::create([
            'nama' => $request->nama,
            'petugas' => $request->petugas,
            'jenis_tim' => $request->jenis_tim,
            'kategori_daerah' => $request->kategori_daerah
    	]);
 
    	return redirect('/tim');
    }

    public function edit($id)
    {
        $jenis_tim = JenisTim::all();
        $kategori_daerah = KategoriDaerah::all();
        $petugas = Petugas::all();
        $tim = Tim::find($id);
        return view('tim.tim_edit', ['tim' => $tim,'petugas' => $petugas,'jenis_tim' => $jenis_tim,'kategori_daerah' => $kategori_daerah]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|string|max:255',
            'petugas' => 'required',
            'jenis_tim' => 'required',
            'kategori_daerah' => 'required',
    	]);
    
        $tim = Tim::find($id);
        $tim->nama = $request->nama;
        $tim->petugas = $request->petugas;
        $tim->jenis_tim = $request->jenis_tim;
        $tim->kategori_daerah = $request->kategori_daerah;
        $tim->save();
        return redirect('/tim');
    }

    public function delete($id)
    {
        $tim = Tim::find($id);
        $tim->delete();
        return redirect()->back();
    }
}
