<?php

use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('laporan')->insert([
        	'id' => 1,
            'isi' => 'Masalah Cepat Terselesaikan tanpa hambatan',
            'penugasan' => 1
        ]);
    }
}
