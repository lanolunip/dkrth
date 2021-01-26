<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipeUser;

class TipeUserController extends Controller
{
    
    public function getNama($id){
        return TipeUser::find($id)->nama;
    }
}
