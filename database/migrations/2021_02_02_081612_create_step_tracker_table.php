<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepTrackerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step_tracker', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('step');
            $table->unsignedInteger('status');

            $table->foreign('status')->references('id')->on('step_tracker_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('step_tracker');
    }
}
