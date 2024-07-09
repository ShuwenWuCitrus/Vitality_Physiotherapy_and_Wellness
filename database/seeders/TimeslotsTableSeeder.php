<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeslotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timeslots = [
            ['time_start' => '10:00:00'],
            ['time_start' => '11:00:00'],
            ['time_start' => '12:00:00'],
            ['time_start' => '13:00:00'],
            ['time_start' => '14:00:00'],
            ['time_start' => '15:00:00'],
            ['time_start' => '16:00:00'],
            ['time_start' => '17:00:00'],
            ['time_start' => '18:00:00']
        ];
        foreach($timeslots as $timeslot){
            DB::table('timeslots')->insert([
                'time_start' => $timeslot
            ]);
        }
    }
}
