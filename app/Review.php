<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
        //tabel nya
        protected $table = "review";
        public $timestamps = false;
        protected $fillable = [
            'id_pelaporan','review','rating'
        ];

        public function Pelaporan(){
            return $this->belongsTo('App\Laporan','id_pelaporan');
        }
}
