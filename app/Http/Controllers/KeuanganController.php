<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Penugasan;
use PDF;

class KeuanganController extends Controller
{
    public function index()
    {
    	return view('keuangan.keuangan_management',['keuangan' => null,'tanggal_mulai' => '','tanggal_akhir' => '']);
    }

    public function hitung(Request $request)
    {
        $this->validate($request,[
    		'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
        ]);
        $penugasan = Penugasan::whereDate('created_at','>=',$request->tanggal_mulai)->whereDate('created_at','<=',$request->tanggal_akhir)->get();
        $keuangan = $penugasan->sum('banyak_pengeluaran');
        $penugasan = Penugasan::whereDate('created_at','>=',$request->tanggal_mulai)->whereDate('created_at','<=',$request->tanggal_akhir)->where('banyak_pengeluaran','>',0)->get();
    	return view('keuangan.keuangan_management',['keuangan' => $keuangan,'tanggal_mulai' => $request->tanggal_mulai,'tanggal_akhir' => $request->tanggal_akhir,
            'penugasan' => $penugasan,'tanggal_mulai'=>$request->tanggal_mulai,'tanggal_berakhir'=>$request->tanggal_akhir])->with('pesan', 'Berhasil Mencari Banyak Pengeluaran !');
    }
    public function print_pdf(Request $request)
    {
        $this->validate($request,[
    		'tanggal_mulai_penugasan' => 'required',
            'tanggal_akhir_penugasan' => 'required',
        ]);

        $penugasan = Penugasan::whereDate('created_at','>=',$request->tanggal_mulai_penugasan)->whereDate('created_at','<=',$request->tanggal_akhir_penugasan)->get();
        $total_pengeluaran = $penugasan->sum('banyak_pengeluaran');
        $penugasan = Penugasan::whereDate('created_at','>=',$request->tanggal_mulai_penugasan)->whereDate('created_at','<=',$request->tanggal_akhir_penugasan)->where('banyak_pengeluaran','>',0)->get();
        $pdf = PDF::loadview('keuangan.keuangan_print_pdf',['total_pengeluaran' => $total_pengeluaran,'tanggal_mulai' => $request->tanggal_mulai_penugasan,'tanggal_akhir' => $request->tanggal_akhir_penugasan,'penugasan' => $penugasan]);
    	return $pdf->stream();
    }
}
