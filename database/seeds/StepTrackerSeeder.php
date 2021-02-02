<?php

use Illuminate\Database\Seeder;

class StepTrackerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('step_tracker')->insert([
            'step' => 0,
            'status' => 1,
        ]);
        DB::table('step_tracker')->insert([
            'step' => 0,
            'status' => 1,
        ]);
        DB::table('step_tracker')->insert([
            'step' => 0,
            'status' => 1,
        ]);
        DB::table('step_tracker')->insert([
            'step' => 0,
            'status' => 1,
        ]);
        DB::table('step_tracker')->insert([
            'step' => 0,
            'status' => 1,
        ]);
    }
}
