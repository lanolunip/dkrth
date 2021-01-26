<?php

use Illuminate\Database\Seeder;

class PenugasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penugasan')->insert([
        	'id' => 1,
            'nama' => 'Pemotongan Pohon Di Jalan Suminep',
            'deskripsi' => 'Ranting Pohon Mengganggu Jalur Listrik',
            'tim' => 1,
            'pelapor' => 'Hendrikus',
            'nomor_telepon_pelapor' => '085785453625',
            'banyak_pengeluaran' => 0,
            'created_at' => '2021-01-24 10:12:18',
            'updated_at' => '2021-01-24 10:13:31',
            'tanggal_berakhir' => '2021-01-24 10:13:31'
        ]);

        DB::table('penugasan')->insert([
        	'id' => 2,
            'nama' => 'Pohon Jatuh Di Jalan Manyar',
            'deskripsi' => 'Ranting Pohon Mengganggu Jalur Listrik',
            'tim' => 3,
            'pelapor' => null,
            'nomor_telepon_pelapor' => null,
            'banyak_pengeluaran' => 0,
            'created_at' => '2021-01-24 10:13:13',
            'updated_at' => '2021-01-24 10:13:13',
            'tanggal_berakhir' => null
        ]);
    
    }
}
