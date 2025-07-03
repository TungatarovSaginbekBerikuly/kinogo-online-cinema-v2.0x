<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CadrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cadrs')->insert([
            ['image' => 'images/cadrs/1.1.jpg', 'film_id' => 1],
            ['image' => 'images/cadrs/1.2.jpg', 'film_id' => 1],
            ['image' => 'images/cadrs/1.3.jpg', 'film_id' => 1],

            ['image' => 'images/cadrs/2.1.jpg', 'film_id' => 2],
            ['image' => 'images/cadrs/2.2.jpg', 'film_id' => 2],
            ['image' => 'images/cadrs/2.3.jpg', 'film_id' => 2],

            ['image' => 'images/cadrs/3.1.jpg', 'film_id' => 3],
            ['image' => 'images/cadrs/3.2.jpg', 'film_id' => 3],
            ['image' => 'images/cadrs/3.3.jpg', 'film_id' => 3],

            ['image' => 'images/cadrs/4.1.jpg', 'film_id' => 4],
            ['image' => 'images/cadrs/4.2.jpg', 'film_id' => 4],
            ['image' => 'images/cadrs/4.3.jpg', 'film_id' => 4],

            ['image' => 'images/cadrs/5.1.jpg', 'film_id' => 5],
            ['image' => 'images/cadrs/5.2.jpg', 'film_id' => 5],
            ['image' => 'images/cadrs/5.3.jpg', 'film_id' => 5],

            ['image' => 'images/cadrs/6.1.jpg', 'film_id' => 6],
            ['image' => 'images/cadrs/6.2.jpg', 'film_id' => 6],
            ['image' => 'images/cadrs/6.3.jpg', 'film_id' => 6],

            ['image' => 'images/cadrs/7.1.jpg', 'film_id' => 7],
            ['image' => 'images/cadrs/7.2.jpg', 'film_id' => 7],
            ['image' => 'images/cadrs/7.3.jpg', 'film_id' => 7],

            ['image' => 'images/cadrs/8.1.jpg', 'film_id' => 8],
            ['image' => 'images/cadrs/8.2.jpg', 'film_id' => 8],
            ['image' => 'images/cadrs/8.3.png', 'film_id' => 8],

            ['image' => 'images/cadrs/9.1.jpeg', 'film_id' => 9],
            ['image' => 'images/cadrs/9.2.jpg', 'film_id' => 9],
            ['image' => 'images/cadrs/9.3.jpg', 'film_id' => 9],

            ['image' => 'images/cadrs/10.1.jpeg', 'film_id' => 10],
            ['image' => 'images/cadrs/10.2.webp', 'film_id' => 10],
            ['image' => 'images/cadrs/10.3.jpg', 'film_id' => 10],
        ]);
    }
}
