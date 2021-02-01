<?php

use Illuminate\Database\Seeder;

class KategoriPelaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_pelaporan')->insert([
        	'id' => 1,
        	'nama' => 'Keluhan Pohon Mengganggu Aktivitas Suatu Pemasangan'
        ]);
        DB::table('kategori_pelaporan')->insert([
        	'id' => 2,
        	'nama' => 'Keluhan Pohon Tumbang'
        ]);
        DB::table('kategori_pelaporan')->insert([
        	'id' => 3,
        	'nama' => 'Keluhan Pohon Diserang Ulat'
        ]);
        DB::table('kategori_pelaporan')->insert([
        	'id' => 4,
        	'nama' => 'Permintaan Pemotongan Pohon'
        ]);
        DB::table('kategori_pelaporan')->insert([
        	'id' => 5,
        	'nama' => 'Permintaan Pemindahan Kayu'
        ]);
    }
}
