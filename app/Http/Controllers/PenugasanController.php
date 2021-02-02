<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penugasan;
use App\Tim;
use App\KategoriDaerah;
use App\Daerah;
use App\Laporan;
use App\StepTracker;
use Carbon\Carbon;

class PenugasanController extends Controller
{
    public function index()
    {
        $penugasan = Penugasan::orderBy('id', 'desc')->paginate(10);
        $laporan = Laporan::all();
    	return view('penugasan.penugasan_management', ['penugasan' => $penugasan,'laporan',$laporan]);
    }

    public function view($id)
    {
        $penugasan = Penugasan::find($id);
        return view('penugasan.penugasan_view', ['penugasan' => $penugasan] );
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
            return redirect()->back()->with('message', 'Pelapor Tidak Boleh Diisi Angka !');
        }

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
        return redirect('/penugasan');
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
        

        // Bagian Laporan
        Laporan::create([
            'isi' => $request->isi,
            'penugasan' => $id
    	]);


        return redirect('/penugasan');
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
 
    	return redirect('/penugasan/rotasi');
    }
}
