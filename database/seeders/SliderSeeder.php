<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sliders')->insert([
            [
                'image' => 'slides/1.jpg',
                'film_id' => 1,
            ],
            [
                'image' => 'slides/2.webp',
                'film_id' => 2,
            ],
             [
                'image' => 'slides/3.jpg',
                'film_id' => 3,
            ],
        ]);
    }
}
