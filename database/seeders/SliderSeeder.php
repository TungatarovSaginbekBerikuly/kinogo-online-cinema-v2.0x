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
                'image' => 'images/slides/2.webp',
                'film_id' => 2,
            ],
             [
                'image' => 'images/slides/3.jpg',
                'film_id' => 4,
            ],
        ]);
    }
}
