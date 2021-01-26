<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    protected $table = "tim";
    public $timestamps = false;
    protected $fillable = ['nama','petugas','jenis_tim','kategori_daerah'];

    public function Petugas(){
        return $this->belongsTo('App\Petugas','petugas');
    }

    public function JenisTim(){
        return $this->belongsTo('App\JenisTim','jenis_tim');
    }

    public function KategoriDaerah(){
        return $this->belongsTo('App\KategoriDaerah','kategori_daerah');
    }
}
