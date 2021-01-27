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

            $table->foreign('pelapor')->references('id')->on('users');
            $table->foreign('daerah')->references('id')->on('daerah');
            $table->foreign('tim')->references('id')->on('tim');
            $table->foreign('penugasan')->references('id')->on('penugasan')->onDelete('cascade');
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
