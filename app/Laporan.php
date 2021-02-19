<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    //tabel nya
    protected $table = "laporan";
    public $timestamps = false;
    protected $fillable = [
        'isi','penugasan'
    ];

    public function Penugasan(){
        return $this->belongsTo('App\Penugasan','penugasan');
    }

    public function Review(){
        return $this->hasOne('App\Review','id_laporan');
    }

}
