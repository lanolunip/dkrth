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
        	'alamat' => 'Jl.Kanser.11',
            'nip' => '1234567891234567981',
            'nomor_telepon' => '085785453625',
        	'email' => 'michaelwilbert11@gmail.com',
            'tipe_user' => 1,
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => '$2y$10$yqrUN5cBSIU9cJA9ZiB3k.V2csAcyhz0tYHDhw1OP.eLAWDOmGtaW',
        	'remember_token' => 'Zo2vMqCNNbG2NGan7gALVlbuL8yEjY2XnEMvRjYLvhTyJe70mRdeuycaxOPb',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
        	'id' => 2,
        	'nama' => 'Dimas Febrian Elvianto',
        	'alamat' => 'Jl. Kembang Dukuh.11',
            'nip' => '123456789123546782',
            'nomor_telepon' => '085785453626',
        	'email' => 'dimas@gmail.com',
            'tipe_user' => 2,
            'password' => '$2y$10$1d7TwarjGi73.Sk7X0UtvuSFQrmE3RJUgMIKQTIZDgJCgWyXIQ4nW',
        	'remember_token' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
        	'id' => 3,
        	'nama' => 'Steven',
        	'alamat' => 'Jl. Apel.11',
            'nip' => '123456789123546783',
            'nomor_telepon' => '085785453627',
        	'email' => 'steven@gmail.com',
            'tipe_user' => 2,
            'password' => '$2y$10$1d7TwarjGi73.Sk7X0UtvuSFQrmE3RJUgMIKQTIZDgJCgWyXIQ4nW',
        	'remember_token' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
        	'id' => 4,
        	'nama' => 'Johny',
        	'alamat' => 'Jl. Semolowaru.11',
            'nip' => '123456789123546784',
            'nomor_telepon' => '085785453628',
        	'email' => 'johny@gmail.com',
            'tipe_user' => 2,
            'password' => '$2y$10$1d7TwarjGi73.Sk7X0UtvuSFQrmE3RJUgMIKQTIZDgJCgWyXIQ4nW',
        	'remember_token' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
        	'id' => 5,
        	'nama' => 'Feriawan',
        	'alamat' => 'Jl. Semampir.11',
            'nip' => '123456789123546785',
            'nomor_telepon' => '085785453629',
        	'email' => 'feriawan@gmail.com',
            'tipe_user' => 2,
            'password' => '$2y$10$1d7TwarjGi73.Sk7X0UtvuSFQrmE3RJUgMIKQTIZDgJCgWyXIQ4nW',
        	'remember_token' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
        	'id' => 6,
        	'nama' => 'Terry',
        	'alamat' => 'Jl. Kembang Dukuh.11',
            'nip' => '123456789123546786',
            'nomor_telepon' => '085785453620',
        	'email' => 'terry@gmail.com',
            'tipe_user' => 2,
            'password' => '$2y$10$1d7TwarjGi73.Sk7X0UtvuSFQrmE3RJUgMIKQTIZDgJCgWyXIQ4nW',
        	'remember_token' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
