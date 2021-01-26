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

    public static function Penugasan(){
        return $this->belongsTo('App\Penugasan','id');
        //atau laporan mungkin hue hue hue
    }

}
