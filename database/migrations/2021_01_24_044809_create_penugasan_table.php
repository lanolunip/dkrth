<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenugasanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penugasan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->text('deskripsi');
            $table->unsignedInteger('tim');
            $table->string('pelapor')->nullable();
            $table->string('nomor_telepon_pelapor')->nullable();
            $table->double('banyak_pengeluaran');
            $table->timestamps();
            $table->timestamp('tanggal_berakhir')->nullable();

            $table->foreign('tim')->references('id')->on('tim');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penugasan');
    }
}
