<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penugasan extends Model
{
     //tabel nya
     protected $table = "penugasan";

     protected $fillable = [
        'nama', 'deskripsi', 'tim','pelapor','nomor_telepon_pelapor',
        'banyak_pengeluaran','laporan','tanggal_berakhir'
    ];

    public function Laporan(){
        return $this->hasOne('App\Laporan','penugasan');
    }

    public function Tim(){
        return $this->belongsTo('App\Tim','tim');
    }
}
