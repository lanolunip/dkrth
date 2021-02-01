<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriPelaporan extends Model
{
     //tabel nya
     protected $table = "kategori_pelaporan";

     public function Pelaporan(){
         return $this->hasMany('App\Pelaporan');
     }
}
