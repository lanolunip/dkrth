<?php

use Illuminate\Database\Seeder;

class TipeKategoriPelaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipe_kategori_pelaporan')->insert([
        	'id' => 1,
            'nama' => 'GANGGUAN',
        ]);
        DB::table('tipe_kategori_pelaporan')->insert([
        	'id' => 2,
            'nama' => 'PERMINTAAN',
        ]);
        DB::table('tipe_kategori_pelaporan')->insert([
        	'id' => 3,
            'nama' => 'LAIN - LAIN',
        ]);
    }
}
