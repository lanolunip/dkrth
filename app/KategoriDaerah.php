<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriDaerah extends Model
{
    //tabel nya
    protected $table = "kategori_daerah";

    public function Daerah(){
        return $this->hasMany('App\Daerah');
    }
}
