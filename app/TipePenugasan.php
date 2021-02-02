<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipePenugasan extends Model
{
     //tabel nya
     protected $table = "tipe_penugasan";

    public function Penugasan(){
        return $this->hasMany('App\Penugasan','tipe_penugasan');
    }
}
