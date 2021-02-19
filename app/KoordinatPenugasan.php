<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KoordinatPenugasan extends Model
{
    protected $table = "koordinat_penugasan";
    public $timestamps = false;
    protected $fillable = ['id_penugasan','id_pelaporan','latitude','longitude'];

    public function Penugasan(){
        return $this->belongsTo('App\Penugasan','id_penugasan');
    }

    public function Pelaporan(){
        return $this->belongsTo('App\Pelaporan','id_pelaporan');
    }
}
