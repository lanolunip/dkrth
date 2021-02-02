<?php

use Illuminate\Database\Seeder;

class TipePenugasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipe_penugasan')->insert([
        	'id' => 1,
            'nama' => 'UMUM',
        ]);
        DB::table('tipe_penugasan')->insert([
        	'id' => 2,
            'nama' => 'ROTASI',
        ]);
    }
}
