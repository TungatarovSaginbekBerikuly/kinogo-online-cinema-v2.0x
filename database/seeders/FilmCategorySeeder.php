<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('film_categories')->insert([
            ['film_id' => 1, 'category_id' => 2],
            ['film_id' => 1, 'category_id' => 12],
            ['film_id' => 1, 'category_id' => 16],

            ['film_id' => 2, 'category_id' => 12],
            ['film_id' => 2, 'category_id' => 17],

            ['film_id' => 3, 'category_id' => 2],
            ['film_id' => 3, 'category_id' => 8],
            ['film_id' => 3, 'category_id' => 12],
            ['film_id' => 3, 'category_id' => 16],
            ['film_id' => 3, 'category_id' => 17],

            ['film_id' => 4, 'category_id' => 2],
            ['film_id' => 4, 'category_id' => 12],
            ['film_id' => 4, 'category_id' => 16],
            ['film_id' => 4, 'category_id' => 17],

            ['film_id' => 5, 'category_id' => 2],
            ['film_id' => 5, 'category_id' => 12],
            ['film_id' => 5, 'category_id' => 16],
            ['film_id' => 5, 'category_id' => 17],

            ['film_id' => 6, 'category_id' => 2],
            ['film_id' => 6, 'category_id' => 12],
            ['film_id' => 6, 'category_id' => 16],
            ['film_id' => 6, 'category_id' => 6],

            ['film_id' => 7, 'category_id' => 2],
            ['film_id' => 7, 'category_id' => 8],
            ['film_id' => 7, 'category_id' => 11],
            ['film_id' => 7, 'category_id' => 12],
            ['film_id' => 7, 'category_id' => 13],
            ['film_id' => 7, 'category_id' => 17],

            ['film_id' => 8, 'category_id' => 6],

            ['film_id' => 9, 'category_id' => 2],
            ['film_id' => 9, 'category_id' => 12],
            ['film_id' => 9, 'category_id' => 17],

            ['film_id' => 10, 'category_id' => 2],
            ['film_id' => 10, 'category_id' => 6],
            ['film_id' => 10, 'category_id' => 17],
        ]);
    }
}
