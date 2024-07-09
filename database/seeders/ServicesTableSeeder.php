<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            ['name' => 'Sport Physiotherapy'],
            ['name' => 'Shockwave Therapy'],
            ['name' => 'Massage Therapy'],
            ['name' => 'Physiotherapy'],
            ['name' => 'Nutritionist Consultation'],
            ['name' => 'Acupuncture'],
            ['name' => 'Aquatherapy'],
            ['name' => 'Chiropractic Therapy']
        ]);
    }
}
