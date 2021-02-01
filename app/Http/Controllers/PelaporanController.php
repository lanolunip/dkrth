<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelaporan;
use App\Daerah;
use Auth;
use App\Tim;
use App\Penugasan;
use App\KategoriPelaporan;
use App\TipeKategoriPelaporan;

class PelaporanController extends Controller
{
    public function index()
    {
        $pelaporan = Pelaporan::orderBy('id', 'desc')->paginate(10);
    	return view('pelaporan.pelaporan_management', ['pelaporan' => $pelaporan]);
    }
    
    public function tipe_kategori_pelaporan(){
    $tipe_kategori_pelaporan = TipeKategoriPelaporan::all();
    return view('pelaporan.tipe_kategori_pelaporan',['tipe_kategori_pelaporan' => $tipe_kategori_pelaporan]);
}
    public function kategori_pelaporan($id_tipe_kategori_pelaporan){
        $kategori_pelaporan = KategoriPelaporan::where('tipe_kategori_pelaporan','like',$id_tipe_kategori_pelaporan)->get();
        return view('pelaporan.kategori_pelaporan',['kategori_pelaporan' => $kategori_pelaporan]);
    }


    public function tambah(Request $request,$id){
        $kategori_pelaporan = KategoriPelaporan::find($id);
        $daerah = Daerah::all();
        return view('pelaporan.pelaporan_tambah', ['kategori_pelaporan' => $kategori_pelaporan,'daerah' => $daerah]);
    }
 
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
    	$this->validate($request,[
            'deskripsi' => 'required|string',
            'daerah' => 'required',
            'kategori_pelaporan' => 'required'
    	]);
            
        Pelaporan::create([
            'deskripsi' => $request->deskripsi,
            'daerah' => $request->daerah,
            'pelapor' => $user_id,
            'kategori_pelaporan' => $request->kategori_pelaporan
    	]);
 
    	return redirect('/pelaporan');
    }

    public function edit($id)
    {
        $pelaporan = Pelaporan::find($id);
        $daerah = Daerah::all();
        // simpanan VVVV
        // $tim = Tim::where('kategori_daerah','LIKE',$pelaporan->Daerah->kategori_daerah)->get();
        return view('pelaporan.pelaporan_edit', ['pelaporan' => $pelaporan,'daerah' => $daerah] );
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'daerah' => 'required',
            'deskripsi' => 'required',
    	]);
    
        $pelaporan = Pelaporan::find($id);
        $pelaporan->daerah = $request->daerah;
        $pelaporan->deskripsi = $request->deskripsi;
        $pelaporan->save();
        return redirect('/pelaporan');
    }

    public function delete($id)
    {
        $pelaporan = Pelaporan::find($id);
        $pelaporan->delete();
        return redirect()->back();
    }

    public function tolak($id){
        $pelaporan = Pelaporan::find($id);
        $pelaporan->status = 2;
        $pelaporan->save();
        return redirect('/pelaporan');
    }
    public function buat_penugasan($id_pelaporan){
        $pelaporan = Pelaporan::find($id_pelaporan);
        $tim = Tim::where('kategori_daerah','like',$pelaporan->Daerah->kategori_daerah)->get();
        return view('pelaporan.pelaporan_buat_penugasan', ['pelaporan' => $pelaporan,'tim' => $tim]);
    }

    public function selesai_buat_penugasan($id_pelaporan,Request $request){

        $pelaporan = Pelaporan::find($id_pelaporan);


        //Bagian Penugasan Baru
        $this->validate($request,[
    		'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tim' => 'required',
            // 'pelapor' => 'required',
            // 'nomor_telepon_pelapor' => 'required',
            // 'banyak_pengeluaran' => 'required',
            // 'laporan' => 'required',
    	]);
 
        Penugasan::create([
    		'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tim' => $request->tim,
            'pelapor' => $pelaporan->pelapor,
            'nomor_telepon_pelapor' => $pelaporan->Pelapor->nomor_telepon,
            'banyak_pengeluaran' => 0,
        ]);
        
        //Bagian Pelaporan
        $pelaporan->penugasan = Penugasan::all()->last()->id;
        $pelaporan->save();
 
    	return redirect('/penugasan');

    }
}
