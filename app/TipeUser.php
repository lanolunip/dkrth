<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeUser extends Model
{
    //tabel nya
    protected $table = "tipe_user";

    public function Users(){
        return $this->hasMany('App\Petugas');
    }

}
