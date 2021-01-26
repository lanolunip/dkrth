<?php

use Illuminate\Database\Seeder;

class TipeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipe_user')->insert([
        	'id' => 1,
        	'nama' => 'Ketua'
        ]);

        DB::table('tipe_user')->insert([
        	'id' => 2,
        	'nama' => 'Petugas'
        ]);

        DB::table('tipe_user')->insert([
        	'id' => 3,
        	'nama' => 'Pelapor'
        ]);
    }
}
