<?php

use Illuminate\Database\Seeder;

class KategoriUploadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_upload')->insert([
        	'id' => 1,
        	'nama' => 'Pelaporan'
        ]);

        DB::table('kategori_upload')->insert([
        	'id' => 2,
        	'nama' => 'Penugasan'
        ]);

        DB::table('kategori_upload')->insert([
        	'id' => 3,
        	'nama' => 'Bukti Pengeluaran'
        ]);
    }
}
