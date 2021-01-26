<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PetugasSeeder::class);
        $this->call(TipeUserSeeder::class);

        $this->call(KategoriDaerahSeeder::class);
        $this->call(DaerahSeeder::class);

        $this->call(JenisTimSeeder::class);
        $this->call(TimSeeder::class);
        
        $this->call(PenugasanSeeder::class);
        $this->call(LaporanSeeder::class);
    }
}
