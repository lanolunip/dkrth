<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;
use App\Penugasan;

class LaporanController extends Controller
{

    public function index()
    {
        $laporan = Laporan::orderBy('id', 'desc')->paginate();
    	return view('laporan.laporan_management',['laporan' => $laporan]);
    }

    public function view($id)
    {
        $laporan = Laporan::find($id);
    	return view('laporan.laporan_view',['laporan' => $laporan]);
    }

    public function edit($id)
    {
        $laporan = Laporan::find($id);
        return view('laporan.laporan_edit', ['laporan' => $laporan] );
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'isi' => 'required',
            'banyak_pengeluaran' => 'required'
    	]);
    
        $laporan = Laporan::find($id);
        $id_penugasan = $laporan->penugasan;
        $laporan->isi = $request->isi;
        $laporan->save();

        $penugasan = Penugasan::find($id_penugasan);
        $penugasan->banyak_pengeluaran = $request->banyak_pengeluaran;
        $penugasan->save();
        return redirect('/laporan');
    }

    public function delete($id)
    {
        $laporan = Laporan::find($id);
        $laporan->delete();
        return redirect()->back();
    }

    public function getIDLaporan($id){
        $laporan = Laporan::where('penugasan','LIKE',$id)->get();
        $id_laporan = $laporan->id;
        return $id_laporan;
    }
}
