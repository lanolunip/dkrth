<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaporan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pelapor');
            $table->unsignedInteger('daerah');
            $table->text('deskripsi');
            $table->unsignedInteger('tim')->nullable();
            $table->unsignedInteger('penugasan')->nullable();
            $table->timestamps();
            $table->time('tanggal_terselesaikan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelaporan');
    }
}
