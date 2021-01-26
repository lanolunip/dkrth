<?php

use Illuminate\Database\Seeder;

class DaerahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daerah')->insert([
        	'id' => 1,
            'nama' => 'Genteng Kali',
            'kategori_daerah' => 1
        ]);

        DB::table('daerah')->insert([
        	'id' => 2,
            'nama' => 'Wisma Lidah Kali',
            'kategori_daerah' => 2
        ]);

        DB::table('daerah')->insert([
        	'id' => 3,
            'nama' => 'Karang Empat Besar',
            'kategori_daerah' => 3
        ]);

        DB::table('daerah')->insert([
        	'id' => 4,
            'nama' => 'Bulak',
            'kategori_daerah' => 4
        ]);

        DB::table('daerah')->insert([
        	'id' => 5,
            'nama' => 'Wonokromo',
            'kategori_daerah' => 5
        ]);
    }
}
