<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemUpload extends Model
{
    //tabel nya
    protected $table = "item_upload";

    protected $fillable = ['kategori_upload','id_upload','nama_file'];

    public function Upload(){
        if($this->kategori_upload == 1){
            return $this->belongsTo('App\Pelaporan');
        }else if($this->kategori_upload == 2){
            return $this->belongsTo('App\Penugasan');
        }else{
            return $this->belongsTo('App\Laporan');
        }
    }
}