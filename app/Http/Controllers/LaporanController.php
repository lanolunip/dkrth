<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;
use App\Penugasan;
use App\ItemUpload;
use App\DetailPengeluaran;
use App\KoordinatPenugasan;

use File;
// import the storage facade
use Illuminate\Support\Facades\Storage;

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
            'total_pengeluaran' => 'required',
            'file_penugasan.*' => 'mimes:pdf,zip',
            'gambar_pengeluaran.*' => 'mimes:jpeg,png,jpg,bmp',
    	]);
    
        $laporan = Laporan::find($id);
        $id_penugasan = $laporan->penugasan;
        $laporan->isi = $request->isi;
        $laporan->save();

        $penugasan = Penugasan::find($id_penugasan);
        $penugasan->banyak_pengeluaran = $request->total_pengeluaran;
        $penugasan->save();

        $nama_pengeluaran = $request->input('nama_pengeluaran', []);
        $banyak_pengeluaran = $request->input('banyak_pengeluaran', []);
        for($data_ke = 0;$data_ke < count($nama_pengeluaran); $data_ke++ ){
            if($nama_pengeluaran[$data_ke] != ''){
                $pengeluaran = DetailPengeluaran::where('id_penugasan','like',$id_penugasan)->get();
            
                $pengeluaran[$data_ke]->nama_pengeluaran = $request->nama_pengeluaran[$data_ke];
                $pengeluaran[$data_ke]->banyak_pengeluaran = $request->banyak_pengeluaran[$data_ke];
                $pengeluaran[$data_ke]->save();
            }
        }       

        if(!empty($request->file_penugasan)){
            // hapus file lama
            $file_lama = ItemUpload::where('kategori_upload','like',2)->where('id_upload','like',$penugasan->id)->get();
            foreach($file_lama as $file){
                unlink('.'.Storage::url($file->nama_file));
            }
            ItemUpload::where('kategori_upload','like',2)->where('id_upload','like',$penugasan->id)->delete();

            // upload file baru
            foreach($request->file_penugasan as $file){
                $nama_file = $file->store('public');
                ItemUpload::create([
                    'kategori_upload' => 2,
                    'id_upload' => $penugasan->id,
                    'nama_file' => $nama_file,
                ]);
            }
            
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
