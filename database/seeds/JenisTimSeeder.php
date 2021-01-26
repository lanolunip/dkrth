<?php

use Illuminate\Database\Seeder;

class JenisTimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_tim')->insert([
        	'id' => 1,
        	'nama' => 'Tim Kadaka'
        ]);

        DB::table('jenis_tim')->insert([
        	'id' => 2,
        	'nama' => 'Tim Gandarusa'
        ]);

        DB::table('jenis_tim')->insert([
        	'id' => 3,
        	'nama' => 'Tim Pemotong Pohon'
        ]);
    }
}
