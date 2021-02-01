<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriPelaporan extends Model
{
     //tabel nya
     protected $table = "kategori_pelaporan";
     public $timestamps = false;
     protected $fillable = ['nama','tipe_kategori_pelaporan'];

     public function Pelaporan(){
         return $this->hasMany('App\Pelaporan');
     }

     public function TipeKategoriPelaporan(){
         return $this->belongsTo('App\TipeKategoriPelaporan','tipe_kategori_pelaporan');
     }
}
