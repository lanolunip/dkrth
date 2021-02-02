<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StepTrackerStatus extends Model
{
     //tabel nya
     protected $table = "step_tracker_status";
     public $timestamps = false;
 
     public function StepTracker(){
         return $this->hasMany('App\StepTracker','status');
     }
}
