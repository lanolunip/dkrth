<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisTim extends Model
{
    //tabel nya
    protected $table = "jenis_tim";

    public function Tim(){
        return $this->hasMany('App\Tim');
    }
}
