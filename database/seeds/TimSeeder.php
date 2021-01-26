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
            'nama' => 'Parto',
            'petugas' => 2,
        	'jenis_tim' => 1,
            'kategori_daerah' => 1,
        ]);

        DB::table('tim')->insert([
        	'id' => 2,
            'nama' => 'Parno',
            'petugas' => 2,
        	'jenis_tim' => 1,
            'kategori_daerah' => 2,
        ]);

        DB::table('tim')->insert([
        	'id' => 3,
            'nama' => 'Pak Ijo',
            'petugas' => 2,
        	'jenis_tim' => 1,
            'kategori_daerah' => 3,
        ]);

        DB::table('tim')->insert([
        	'id' => 4,
            'nama' => 'Pak Suminem',
            'petugas' => 2,
        	'jenis_tim' => 1,
            'kategori_daerah' => 4,
        ]);

        DB::table('tim')->insert([
        	'id' => 5,
            'nama' => 'Pak Sukija',
            'petugas' => 2,
        	'jenis_tim' => 1,
            'kategori_daerah' => 5,
        ]);
    }
}
