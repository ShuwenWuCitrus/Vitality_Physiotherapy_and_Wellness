<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('professionals')->insert([
            ['name' => 'Jason Lee'],
            ['name' => 'Michael Villaflor'],
            ['name' => 'Sarah Patel'],
            ['name' => 'Karen Bongley'],
            ['name' => 'Maira Costa'],
            ['name' => 'David Smith'],
            ['name' => 'Sophie Lambert'],
            ['name' => 'Rachel Harris'],
            ['name' => 'Emily Sanchez'],
            ['name' => 'Nadia Smith']
        ]);
    }
}
