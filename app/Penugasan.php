<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penugasan extends Model
{
     //tabel nya
     protected $table = "penugasan";

     protected $fillable = [
        'nama', 'tipe_penugasan','deskripsi', 'tim','pelapor','nomor_telepon_pelapor',
        'banyak_pengeluaran','laporan','tanggal_berakhir'
    ];

    public function Pelapor(){
        return $this->belongsTo('App\Petugas','pelapor');
    }
    
    public function Laporan(){
        return $this->hasOne('App\Laporan','penugasan');
    }

    public function Tim(){
        return $this->belongsTo('App\Tim','tim');
    }

    public function Pelaporan(){
        return $this->hasOne('App\Pelaporan','penugasan');
    }

    public function TipePenugasan(){
        return $this->belongsTo('App\TipePenugasan','tipe_penugasan');
    }
}
