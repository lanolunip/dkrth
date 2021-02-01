<?php

use Illuminate\Database\Seeder;

class StatusPelaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_pelaporan')->insert([
        	'id' => 1,
        	'nama' => 'Dalam Proses'
        ]);
        DB::table('status_pelaporan')->insert([
        	'id' => 2,
        	'nama' => 'Dibatalkan'
        ]);
        DB::table('status_pelaporan')->insert([
        	'id' => 3,
        	'nama' => 'Telah Diselesaikan'
        ]);
    }
}
