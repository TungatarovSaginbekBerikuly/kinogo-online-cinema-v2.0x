<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ReleaseYearSeeder::class,
            UserSeeder::class,
            FilmSeeder::class,
            FilmCategorySeeder::class,
            SliderSeeder::class,
            CommentSeeder::class,
            CadrSeeder::class
        ]);
    }
}
