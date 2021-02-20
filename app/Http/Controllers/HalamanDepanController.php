<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelaporan;
use App\Penugasan;
use App\Review;
use App\Laporan;


class HalamanDepanController extends Controller
{
    public function index()
    {
        $jumlah_pelaporan = Pelaporan::all()->count();
        $jumlah_penugasan = Penugasan::all()->count();
        $rata_rata_rating = round(Review::avg('rating'),2); 
    	return view('welcome', [
            'jumlah_pelaporan' => $jumlah_pelaporan,
            'jumlah_penugasan' => $jumlah_penugasan,
            'rata_rata_rating' => $rata_rata_rating,
        ]);
    }
}
