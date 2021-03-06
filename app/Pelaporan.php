<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
     //tabel nya
     protected $table = "pelaporan";

     protected $fillable = [
        'pelapor', 'daerah', 'tim','deskripsi','penugasan',
        'kategori_pelaporan','status_pelaporan'
    ];

    public function Pelapor(){
        return $this->belongsTo('App\Petugas','pelapor');
    }

    public function Daerah(){
        return $this->belongsTo('App\Daerah','daerah');
    }

    public function Tim(){
        return $this->belongsTo('App\Tim','tim');
    }

    public function Penugasan(){
        return $this->belongsTo('App\Penugasan','penugasan');
    }

    public function KategoriPelaporan(){
        return $this->belongsTo('App\KategoriPelaporan','kategori_pelaporan');
    }

    public function StatusPelaporan(){
        return $this->belongsTo('App\StatusPelaporan','status');
    }

    public function FotoPelaporan(){
        return $this->hasMany('App\ItemUpload','id_upload')->where('kategori_upload','like',1);
    }

    public function Koordinat(){
        return $this->hasOne('App\KoordinatPenugasan','id_pelaporan');
    }

    public function Review(){
        return $this->hasOne('App\Review','id_pelaporan');
    }
    
}
