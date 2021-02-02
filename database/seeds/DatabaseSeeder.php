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
        $this->call(TipeUserSeeder::class);
        $this->call(PetugasSeeder::class);
        
        $this->call(KategoriDaerahSeeder::class);
        $this->call(DaerahSeeder::class);
        
        $this->call(JenisTimSeeder::class);
        $this->call(TimSeeder::class);
        
        $this->call(TipePenugasanSeeder::class);
        $this->call(PenugasanSeeder::class);
        $this->call(LaporanSeeder::class);

        $this->call(TipeKategoriPelaporanSeeder::class);
        $this->call(KategoriPelaporanSeeder::class);
        $this->call(StatusPelaporanSeeder::class);

        $this->call(StepTrackerStatusSeeder::class);
        $this->call(StepTrackerSeeder::class);
    }
}
