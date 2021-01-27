<?php

use Illuminate\Database\Seeder;

class TimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tim')->insert([
        	'id' => 1,
            'nama' => 'Tim Dimas',
            'petugas' => 2,
        	'jenis_tim' => 1,
            'kategori_daerah' => 1,
        ]);

        DB::table('tim')->insert([
        	'id' => 2,
            'nama' => 'Tim Steven',
            'petugas' => 3,
        	'jenis_tim' => 1,
            'kategori_daerah' => 2,
        ]);

        DB::table('tim')->insert([
        	'id' => 3,
            'nama' => 'Tim Johny',
            'petugas' => 4,
        	'jenis_tim' => 2,
            'kategori_daerah' => 3,
        ]);

        DB::table('tim')->insert([
        	'id' => 4,
            'nama' => 'Tim Feriawan',
            'petugas' => 5,
        	'jenis_tim' => 2,
            'kategori_daerah' => 4,
        ]);

        DB::table('tim')->insert([
        	'id' => 5,
            'nama' => 'Tim Terry',
            'petugas' => 6,
        	'jenis_tim' => 3,
            'kategori_daerah' => 5,
        ]);
    }
}
