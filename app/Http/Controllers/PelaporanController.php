<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelaporan;
use App\Daerah;
use Auth;
class PelaporanController extends Controller
{
    public function index()
    {
        $pelaporan = Pelaporan::orderBy('id', 'desc')->paginate(10);
    	return view('pelaporan.pelaporan_management', ['pelaporan' => $pelaporan]);
    }

    public function tambah()
    {
        $daerah = Daerah::all();
    	return view('pelaporan.pelaporan_tambah',['daerah' => $daerah]);
    }
 
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
    	$this->validate($request,[
            // 'pelapor', 'daerah', 'tim','deskripsi','penugasan',
            // 'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'daerah' => 'required',
    	]);
            
        Pelaporan::create([
            'deskripsi' => $request->deskripsi,
            'daerah' => $request->daerah,
            'pelapor' => $user_id,
    	]);
 
    	return redirect('/pelaporan');
    }

    public function edit($id)
    {
        $pelaporan = Pelaporan::find($id);
        $daerah = Daerah::all();
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

    public function laporan($id){
        $penugasan = Penugasan::find($id);
        $tim = Tim::all();
        return view('penugasan.penugasan_laporan', ['penugasan' => $penugasan,'tim' => $tim]);
    }

    public function selesaikan($id,Request $request){


        $this->validate($request,[
            //Bagian Penugasan
            'banyak_pengeluaran' => 'required',

            //Bagian Laporan
            'isi' => 'required|string',
        ]);
        
        //Bagian Penugasan
        $penugasan = Penugasan::find($id);
        $penugasan->banyak_pengeluaran = $request->banyak_pengeluaran;
        $penugasan->tanggal_berakhir = Carbon::now()->toDateTimeString(); 
        $penugasan->save();

        // Bagian Laporan
        Laporan::create([
            'isi' => $request->isi,
            'penugasan' => $id
    	]);


        return redirect('/penugasan');
    }

    public function buat_penugasan($id){
        $pelaporan = Penugasan::find($id);
        $tim = Tim::all();
        return view('pelaporan.pelaporan_buat_penugasan', ['pelaporan' => $pelaporan,'tim' => $tim]);
    }
}
