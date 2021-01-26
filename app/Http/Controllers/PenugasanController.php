<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penugasan;
use App\Tim;
use App\Laporan;
use Carbon\Carbon;

class PenugasanController extends Controller
{
    public function index()
    {
        $penugasan = Penugasan::orderBy('id', 'desc')->paginate(10);
        $laporan = Laporan::all();
    	return view('penugasan.penugasan_management', ['penugasan' => $penugasan,'laporan',$laporan]);
    }

    public function tambah()
    {
        $tim = Tim::all();
    	return view('penugasan.penugasan_tambah',['tim' => $tim]);
    }
 
    public function store(Request $request)
    {
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
            'pelapor' => $request->pelapor,
            'nomor_telepon_pelapor' => $request->nomor_telepon_pelapor,
            'banyak_pengeluaran' => 0,
    	]);
 
    	return redirect('/penugasan');
    }

    public function edit($id)
    {
        $penugasan = Penugasan::find($id);
        $tim = Tim::all();
        return view('penugasan.penugasan_edit', ['penugasan' => $penugasan,'tim' => $tim] );
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
    		'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tim' => 'required',
            // 'pelapor' => 'required',
            // 'nomor_telepon_pelapor' => 'required',
            // 'banyak_pengeluaran' => 'required',
            // 'laporan' => 'required'
    	]);
    
        $penugasan = Penugasan::find($id);
        $penugasan->nama = $request->nama;
        $penugasan->deskripsi = $request->deskripsi;
        $penugasan->tim = $request->tim;
        $penugasan->pelapor = $request->pelapor;
        $penugasan->nomor_telepon_pelapor = $request->nomor_telepon_pelapor;
        // $penugasan->banyak_pengeluaran = $request->banyak_pengeluaran;
        // $penugasan->tanggal_berakhir = Carbon::now()->toDateTimeString(); 
        $penugasan->save();
        return redirect('/penugasan');
    }

    public function delete($id)
    {
        $penugasan = Penugasan::find($id);
        $penugasan->delete();
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


}
