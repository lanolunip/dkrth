<?php

use Illuminate\Database\Seeder;

class KategoriDaerahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_daerah')->insert([
        	'id' => 1,
        	'nama' => 'Surabaya Pusat'
        ]);

        DB::table('kategori_daerah')->insert([
        	'id' => 2,
        	'nama' => 'Surabaya Barat'
        ]);

        DB::table('kategori_daerah')->insert([
        	'id' => 3,
        	'nama' => 'Surabaya Timur'
        ]);

        DB::table('kategori_daerah')->insert([
        	'id' => 4,
        	'nama' => 'Surabaya Utara'
        ]);

        DB::table('kategori_daerah')->insert([
        	'id' => 5,
        	'nama' => 'Surabaya Selatan'
        ]);
    }
}
