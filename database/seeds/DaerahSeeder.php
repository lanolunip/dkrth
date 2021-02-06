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
        // 
        DB::table('daerah')->insert([
            'nama' => 'Wonokromo',
            'kategori_daerah' => 5
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Tegalsari',
            'kategori_daerah' => 1
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Bubutan',
            'kategori_daerah' => 1
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Simokerto',
            'kategori_daerah' => 1
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Tandes',
            'kategori_daerah' => 2
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Asemworo',
            'kategori_daerah' => 2
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Sukomanunggal',
            'kategori_daerah' => 2
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Benowo',
            'kategori_daerah' => 2
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Pakel',
            'kategori_daerah' => 2
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Lakasantri',
            'kategori_daerah' => 2
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Sambikerep',
            'kategori_daerah' => 2
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Tambaksari',
            'kategori_daerah' => 3
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Gubeng',
            'kategori_daerah' => 3
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Rungkut',
            'kategori_daerah' => 3
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Tenggilis Menjoyo',
            'kategori_daerah' => 3
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Gunung Anyar',
            'kategori_daerah' => 3
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Sukolilo',
            'kategori_daerah' => 3
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Mulyorejo',
            'kategori_daerah' => 3
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Pabean Cantikan',
            'kategori_daerah' => 4
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Semampir',
            'kategori_daerah' => 4
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Krembangan',
            'kategori_daerah' => 4
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Kenjeran',
            'kategori_daerah' => 4
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Sawahan',
            'kategori_daerah' => 5
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Dukuh Pakis',
            'kategori_daerah' => 5
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Karangpilang',
            'kategori_daerah' => 5
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Wiyung',
            'kategori_daerah' => 5
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Wonocolo Jambangan',
            'kategori_daerah' => 5
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Gayungan',
            'kategori_daerah' => 5
        ]);
        DB::table('daerah')->insert([
            'nama' => 'Jambangan',
            'kategori_daerah' => 5
        ]);
    }
}
