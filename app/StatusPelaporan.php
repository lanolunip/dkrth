<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPelaporan extends Model
{
     //tabel nya
     protected $table = "status_pelaporan";

     public function Pelaporan(){
         return $this->hasMany('App\Pelaporan');
     }
}
