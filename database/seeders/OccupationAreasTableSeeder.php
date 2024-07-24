<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OccupationAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define occupation areas based on professionals and services
        $occupationAreas = [
            // Jason Lee
            ['service_id' => 3, 'professional_id' => 1], // Massage Therapy
            ['service_id' => 4, 'professional_id' => 1], // Physiotherapy

            // Michael Villaflor
            ['service_id' => 1, 'professional_id' => 2], // Sport Physiotherapy
            ['service_id' => 2, 'professional_id' => 2], // Shockwave Therapy
            ['service_id' => 3, 'professional_id' => 2], // Massage Therapy
            ['service_id' => 4, 'professional_id' => 2], // Physiotherapy

            // Sarah Patel
            ['service_id' => 5, 'professional_id' => 3], // Nutritionist Consultation

            // Karen Bongley
            ['service_id' => 8, 'professional_id' => 4], // Chiropractic Therapy
            ['service_id' => 3, 'professional_id' => 4], // Massage Therapy

            // Maira Costa
            ['service_id' => 1, 'professional_id' => 5], // Sport Physiotherapy
            ['service_id' => 6, 'professional_id' => 5], // Acupuncture

            // David Smith
            ['service_id' => 4, 'professional_id' => 6], // Physiotherapy

            // Sophie Lambert
            ['service_id' => 8, 'professional_id' => 7], // Chiropractic Therapy
            ['service_id' => 5, 'professional_id' => 7], // Nutritionist Consultation

            // Rachel Harris
            ['service_id' => 4, 'professional_id' => 8], // Physiotherapy
            ['service_id' => 3, 'professional_id' => 8], // Massage Therapy
            ['service_id' => 1, 'professional_id' => 8], // Sport Physiotherapy

            // Nadia Smith
            ['service_id' => 7, 'professional_id' => 9], // Aquatherapy
        ];

        // Insert occupation areas into the database
        foreach ($occupationAreas as $area) {
            DB::table('occupation_areas')->insert($area);
        };
    }
}
