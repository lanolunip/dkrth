<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'id' => 1,
        	'nama' => 'Michael Wilbert Gunawan',
        	'alamat' => null,
            'nip' => null,
            'nomor_telepon' => null,
        	'email' => 'michaelwilbert11@gmail.com',
            'tipe_user' => 1,
            'password' => '$2y$10$yqrUN5cBSIU9cJA9ZiB3k.V2csAcyhz0tYHDhw1OP.eLAWDOmGtaW',
        	'remember_token' => 'Zo2vMqCNNbG2NGan7gALVlbuL8yEjY2XnEMvRjYLvhTyJe70mRdeuycaxOPb',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
        	'id' => 2,
        	'nama' => 'Dimas Febrian Elvianto',
        	'alamat' => 'Jl. Asemi.11',
            'nip' => '123456789123546789',
            'nomor_telepon' => '085785453625',
        	'email' => 'ucip11@gmail.com',
            'tipe_user' => 2,
            'password' => '$2y$10$1d7TwarjGi73.Sk7X0UtvuSFQrmE3RJUgMIKQTIZDgJCgWyXIQ4nW',
        	'remember_token' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
