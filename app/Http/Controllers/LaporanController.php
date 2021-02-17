<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;
use App\Penugasan;
use App\ItemUpload;
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
            'banyak_pengeluaran' => 'required',
            'gambar.*' => 'mimes:jpeg,png,jpg,bmp',
    	]);
    
        $laporan = Laporan::find($id);
        $id_penugasan = $laporan->penugasan;
        $laporan->isi = $request->isi;
        $laporan->save();

        $penugasan = Penugasan::find($id_penugasan);
        $penugasan->banyak_pengeluaran = $request->banyak_pengeluaran;
        $penugasan->save();

        if(!empty($request->gambar)){
            // hapus foto lama
            ItemUpload::where('kategori_upload','like',2)->where('id_upload','like',$penugasan->id)->delete();
            // upload foto baru
            foreach($request->gambar as $gambar){
                $nama_file = $gambar->store('public');
                ItemUpload::create([
                    'kategori_upload' => 2,
                    'id_upload' => $penugasan->id,
                    'nama_file' => $nama_file,
                ]);
            }
            return redirect('/laporan')->with('pesan', $nama_file.$laporan->id);
        }
        return redirect('/laporan')->with('pesan', 'Berhasil Mengubah Data Laporan !');
    }

    public function delete($id)
    {
        $laporan = Laporan::find($id);
        $laporan->delete();
        return redirect()->back()->with('pesan', 'Berhasil Menghapus Laporan !');
    }

    public function getIDLaporan($id){
        $laporan = Laporan::where('penugasan','LIKE',$id)->get();
        $id_laporan = $laporan->id;
        return $id_laporan;
    }
}
