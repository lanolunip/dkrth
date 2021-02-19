<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penugasan;
use App\Tim;
use App\KategoriDaerah;
use App\Daerah;
use App\Laporan;
use App\StepTracker;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\ItemUpload;
use App\DetailPengeluaran;
use App\KoordinatPenugasan;

class PenugasanController extends Controller
{
    public function index()
    {
        if(Auth::user()->TipeUser->nama == 'Petugas'){
            $user_id = Auth::user()->id;
            $tim = Tim::where('petugas','like',$user_id)->first();
            if(empty($tim->id)){
                return redirect()->back()->with('pesan', 'Anda Belum Terdaftar Pada Tim manapun, Harap Hubungi Admin');
            }
            $penugasan = Penugasan::where('tim','like',$tim->id)->orderBy('id', 'desc')->paginate(10);
            $laporan = Laporan::all();
        }else{
            $penugasan = Penugasan::orderBy('id', 'desc')->paginate(10);
            $laporan = Laporan::all();
        }
    	return view('penugasan.penugasan_management', ['penugasan' => $penugasan,'laporan',$laporan]);
    }

    public function view($id)
    {
        $penugasan = Penugasan::find($id);
        $pengeluaran = $penugasan->Pengeluaran;
        $foto_penugasan = ItemUpload::where('id_upload','like',$penugasan->id)->where('kategori_upload','like',2)->get();
        $foto_pengeluaran = ItemUpload::where('id_upload','like',$penugasan->id)->where('kategori_upload','like',3)->get();
        if(!empty($penugasan->Pelaporan->id)){
            $foto_pelaporan = ItemUpload::where('id_upload','like',$penugasan->Pelaporan->id)->where('kategori_upload','like',1)->get();
        }else{
            $foto_pelaporan = [];
        }


        return view('penugasan.penugasan_view', ['penugasan' => $penugasan,
            'pengeluaran' => $pengeluaran,'foto_penugasan' => $foto_penugasan,
            'foto_pengeluaran' => $foto_pengeluaran,'foto_pelaporan' => $foto_pelaporan]);
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
        
        if (is_numeric($request->pelapor)){
            return redirect()->back()->with('pesan', 'Pelapor Tidak Boleh Diisi Angka !');
        }

        Penugasan::create([
    		'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tim' => $request->tim,
            'pelapor' => $request->pelapor,
            'nomor_telepon_pelapor' => $request->nomor_telepon_pelapor,
            'banyak_pengeluaran' => 0,
    	]);
 
    	return redirect('/penugasan')->with('pesan', 'Penugasan Telah Berhasil Dibuat !');
    }

    public function edit($id)
    {
        $penugasan = Penugasan::find($id);
        if(!empty($penugasan->Tim()->kategori_daerah)){
            $tim = Tim::where('kategori_daerah','LIKE',$penugasan->Tim->kategori_daerah);
        }else{
            $tim = Tim::all();
        }
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
        if (!empty($penugasan->Pelapor->nama)) {
            $penugasan->pelapor = $penugasan->Pelapor->id;
            $penugasan->nomor_telepon_pelapor = $penugasan->Pelapor->nomor_telepon;
        }else{
            $penugasan->pelapor = $request->pelapor;
            $penugasan->nomor_telepon_pelapor = $request->nomor_telepon_pelapor;
        }
        // $penugasan->banyak_pengeluaran = $request->banyak_pengeluaran;
        // $penugasan->tanggal_berakhir = Carbon::now()->toDateTimeString(); 
        $penugasan->save();
        return redirect('/penugasan')->with('pesan', 'Penugasan Berhasil Diperbarui !');
    }

    public function delete($id)
    {
        $penugasan = Penugasan::find($id);
        if ($penugasan->tipe_penugasan == 2){
            $step_tracker = StepTracker::find($penugasan->Tim->kategori_daerah);
            $step_tracker->status = 1;
            $step_tracker->save();
        }
        $penugasan->delete();
        return redirect()->back()->with('pesan', 'Penugasan Telah Berhasil Dihapus !');
    }

    public function laporan($id){
        $penugasan = Penugasan::find($id);
        $tim = Tim::all();
        return view('penugasan.penugasan_laporan', ['penugasan' => $penugasan,'tim' => $tim]);
    }

    public function selesaikan($id,Request $request){

        if($request->total_pengeluaran !=0){
            $this->validate($request,[
                //Bagian Penugasan
                'total_pengeluaran' => 'required',
                'file_penugasan' => 'required',
                'gambar_pengeluaran' => 'required',
                'file_penugasan.*' => 'mimes:pdf,zip|max:3000',
                'gambar_pengeluaran.*' => 'mimes:jpeg,png,jpg,bmp|max:3000',
    
                //Bagian Laporan
                'isi' => 'required|string',
            ]);
        }else{
            $this->validate($request,[
                //Bagian Penugasan
                'total_pengeluaran' => 'required',
                'file_penugasan' => 'required',
                'file_penugasan.*' => 'mimes:pdf,zip|max:3000',
                'gambar_pengeluaran.*' => 'mimes:jpeg,png,jpg,bmp|max:3000',
    
                //Bagian Laporan
                'isi' => 'required|string',
            ]);
        }

        //Bagian Penugasan
        $penugasan = Penugasan::find($id);
        $penugasan->banyak_pengeluaran = $request->total_pengeluaran;
        $penugasan->tanggal_berakhir = Carbon::now()->toDateTimeString();

        if(!empty($penugasan->Pelaporan->status)){
            $penugasan->Pelaporan->status = 3;
            $penugasan->Pelaporan->save();
        }

        if ($penugasan->tipe_penugasan == 2){
            $step_tracker = StepTracker::find($penugasan->Tim->kategori_daerah);
            $step_tracker->status = 1;
            $step_tracker->step+=1;
            $step_tracker->save();
        }
        $penugasan->save();
        
        foreach($request->file_penugasan as $gambar){
            $nama_file = $gambar->store('public');
            ItemUpload::create([
                'kategori_upload' => 2,
                'id_upload' => $id,
                'nama_file' => $nama_file,
            ]);
        }
        if(!empty($request->total_pengeluaran) && !empty($request->nama_pengeluaran)){
            foreach($request->gambar_pengeluaran as $gambar){
                $nama_file = $gambar->store('public');
                ItemUpload::create([
                    'kategori_upload' => 3,
                    'id_upload' => $id,
                    'nama_file' => $nama_file,
                ]);
            }
        }
        $nama_pengeluaran = $request->input('nama_pengeluaran', []);
        $banyak_pengeluaran = $request->input('banyak_pengeluaran', []);
        for($data_ke = 0;$data_ke < count($nama_pengeluaran); $data_ke++ ){
            if($nama_pengeluaran[$data_ke] != ''){
                DetailPengeluaran::create([
                    'id_penugasan' => $id,
                    'nama_pengeluaran' => $nama_pengeluaran[$data_ke],
                    'banyak_pengeluaran' => $banyak_pengeluaran[$data_ke],
                ]);
            }
        }       
        // Bagian Laporan
        Laporan::create([
            'isi' => $request->isi,
            'penugasan' => $id
    	]);


        return redirect('/penugasan')->with('pesan', 'Penugasan Berhasil Diselesaikan !');
    }

    public function index_rotasi()
    {
        $kategori_daerah = KategoriDaerah::all();
        $step_tracker = StepTracker::all();
    	return view('penugasan.rotasi.rotasi_management',['kategori_daerah' => $kategori_daerah,'step_tracker'=> $step_tracker]);
    }

    public function tambah_rotasi($id)
    {
        $daerah = Daerah::find($id);
        $tim = Tim::where('kategori_daerah','like',$daerah->KategoriDaerah->id)->get();
        return view('penugasan.rotasi.rotasi_tambah',['tim' => $tim,'daerah' => $daerah]);
    }

    public function store_rotasi(Request $request){
        $this->validate($request,[
    		'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tim' => 'required',
        ]);
        
        Penugasan::create([
    		'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tipe_penugasan' => 2,
            'tim' => $request->tim,
            'banyak_pengeluaran' => 0,
        ]);
        

        $daerah = Daerah::find($request->daerah);
        $step_tracker = StepTracker::find($daerah->KategoriDaerah->id);
        
        $step_tracker->status = 2;
        $step_tracker->save();
 
    	return redirect('/penugasan/rotasi')->with('pesan', 'Penugasan Rotasi Berhasil Dibuat !');
    }
}
