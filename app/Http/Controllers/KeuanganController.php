<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Penugasan;

class KeuanganController extends Controller
{
    public function index()
    {
    	return view('keuangan.keuangan_management',['keuangan' => null,'tanggal_mulai' => '','tanggal_akhir' => '']);
    }

    public function hitung(Request $request)
    {
        $penugasan = Penugasan::whereDate('created_at','>=',$request->tanggal_mulai)->whereDate('created_at','<=',$request->tanggal_akhir);
        $keuangan = $penugasan->sum('banyak_pengeluaran');
    	return view('keuangan.keuangan_management',['keuangan' => $keuangan,'tanggal_mulai' => $request->tanggal_mulai,'tanggal_akhir' => $request->tanggal_akhir]);
    }
}
