<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StepTracker extends Model
{
    //tabel nya
    protected $table = "step_tracker";
    public $timestamps = false;

    public function StepTrackerStatus(){
        return $this->belongsTo('App\StepTrackerStatus','status');
    }
}
