<?php

use Illuminate\Database\Seeder;

class StepTrackerStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('step_tracker_status')->insert([
        	'id' => 1,
        	'nama' => 'Dapat Diproses'
        ]);
        DB::table('step_tracker_status')->insert([
        	'id' => 2,
        	'nama' => 'Sedang Diproses'
        ]);
    }
}
