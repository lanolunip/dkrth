<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPengeluaran extends Model
{
    //Nama Tabelnya
    protected $table = "detail_pengeluaran";
    public $timestamps = false;
    protected $fillable = ['id_penugasan','nama_pengeluaran','banyak_pengeluaran'];

    public function Penugasan(){
        return $this->belongsTo('app\Penugasan','id_penugasan');
    }
}
