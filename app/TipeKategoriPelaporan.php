<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeKategoriPelaporan extends Model
{
    //tabel nya
    protected $table = "tipe_kategori_pelaporan";
    public $timestamps = false;
    protected $fillable = ['nama'];

    public function KategoriPelaporan(){
        return $this->hasMany('App\KategoriPelaporan');
    }
}
