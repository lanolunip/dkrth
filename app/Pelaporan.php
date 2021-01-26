<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
     //tabel nya
     protected $table = "pelaporan";

     protected $fillable = [
        'pelapor', 'daerah', 'tim','deskripsi','penugasan',
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
}
