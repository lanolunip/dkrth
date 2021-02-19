<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKoordinatPenugasanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koordinat_penugasan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_penugasan')->nullable();
            $table->unsignedInteger('id_pelaporan')->nullable();
            $table->foreign('id_penugasan')->references('id')->on('penugasan');
            $table->foreign('id_pelaporan')->references('id')->on('pelaporan');
            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_koordinat_penugasan');
    }
}
