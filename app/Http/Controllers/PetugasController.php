<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Petugas;
use App\TipeUser;
use Auth;

class PetugasController extends Controller
{

    public function index()
    {
        $petugas = Petugas::orderBy('id', 'desc')->paginate(10);
    	return view('petugas.user_management', ['petugas' => $petugas]);
    }

    public function tambah()
    {
    	return view('petugas.petugas_tambah');
    }
 
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nip' => 'required|min:18|max:18|unique:users',
            'nomor_telepon' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6'
    	]);
 
        Petugas::create([
    		'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nip' => $request->nip,
            'nomor_telepon' => $request->nomor_telepon,
            'email' => $request->email,
            'tipe_user' => 2,
            'password' => Hash::make($request->password),
    	]);
 
    	return redirect('/petugas')->with('pesan', 'Berhasil Menambahkan Petugas Baru !');
    }

    public function edit($id)
    {
        $petugas = Petugas::find($id);
        $tipe_user = TipeUser::all();
        return view('petugas.petugas_edit', ['petugas' => $petugas, 'tipe_user' => $tipe_user]);
    }

    public function update($id, Request $request)
    {

        $petugas = Petugas::find($id);
        if($petugas->tipe_user == 3){
            $this->validate($request,[
                'nama' => 'required|string|max:255',
                'nomor_telepon' => 'required',
                'email' => 'required|email|max:255',
                'tipe_user' => 'required',
            ]);
        }else{
            $this->validate($request,[
                'nama' => 'required|string|max:255',
                'alamat' => 'required|string',
                'nip' => 'required|min:18|max:18',
                'nomor_telepon' => 'required',
                'email' => 'required|email|max:255',
                'tipe_user' => 'required',
            ]);
        }
            
        $petugas->nama = $request->nama;
        $petugas->alamat = $request->alamat;
        $petugas->nip = $request->nip;
        $petugas->nomor_telepon = $request->nomor_telepon;
        $petugas->email = $request->email;
        $petugas->tipe_user = $request->tipe_user;
        $petugas->save();
        return redirect('/petugas')->with('pesan', 'Berhasil Mengubah Data Petugas !');
    }

    public function delete($id)
    {
        $petugas = Petugas::find($id);
        $petugas->delete();
        return redirect()->back()->with('pesan', 'Berhasil Menghapus Petugas !');
    }
}
