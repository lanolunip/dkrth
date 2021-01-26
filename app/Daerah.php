<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
    protected $table = "daerah";
    public $timestamps = false;
    protected $fillable = ['nama','kategori_daerah'];

    public function KategoriDaerah(){
        return $this->belongsTo('App\KategoriDaerah','kategori_daerah');
    }
}
