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
            'nama' => 'Keluhan Pohon Mengganggu Aktivitas Suatu Pemasangan',
            'tipe_kategori_pelaporan' => 1
        ]);
        DB::table('kategori_pelaporan')->insert([
        	'id' => 2,
            'nama' => 'Keluhan Pohon Tumbang',
            'tipe_kategori_pelaporan' => 1
        ]);
        DB::table('kategori_pelaporan')->insert([
        	'id' => 3,
            'nama' => 'Keluhan Pohon Diserang Ulat',
            'tipe_kategori_pelaporan' => 1
        ]);
        DB::table('kategori_pelaporan')->insert([
        	'id' => 4,
            'nama' => 'Permintaan Pemotongan Pohon',
            'tipe_kategori_pelaporan' => 2
        ]);
        DB::table('kategori_pelaporan')->insert([
        	'id' => 5,
            'nama' => 'Permintaan Pemindahan Kayu',
            'tipe_kategori_pelaporan' => 2
        ]);
        DB::table('kategori_pelaporan')->insert([
        	'id' => 6,
            'nama' => 'Permintaan Lain - Lain',
            'tipe_kategori_pelaporan' => 3
        ]);
        DB::table('kategori_pelaporan')->insert([
        	'id' => 7,
            'nama' => 'Gangguan Lain - Lain',
            'tipe_kategori_pelaporan' => 3
        ]);
    }
}
