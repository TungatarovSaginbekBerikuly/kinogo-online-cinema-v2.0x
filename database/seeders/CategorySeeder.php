<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['title' => 'Биографии', 'alias' => 'biographies'],
            ['title' => 'Боевики', 'alias' => 'boyeviki'],
            ['title' => 'Военные', 'alias' => 'military'],
            ['title' => 'Детективы','alias' => 'detectives'],
            ['title' => 'Документальные', 'alias' => 'documentary'],
            ['title' => 'Драмы', 'alias' => 'drama'],
            ['title' => 'Исторические', 'alias' => 'historical'],
            ['title' => 'Комедии', 'alias' => 'comedy'],
            ['title' => 'Криминал', 'alias' => 'crime'],
            ['title' => 'Мелодрамы', 'alias' => 'melodramas'],
            ['title' => 'Мульфильмы', 'alias' => 'cartoons'],
            ['title' => 'Приключения', 'alias' => 'adventures'],
            ['title' => 'Семейные', 'alias' => 'family'],
            ['title' => 'Триллеры', 'alias' => 'thrillers'],
            ['title' => 'Ужасы', 'alias' => 'horror'],
            ['title' => 'Фантастика', 'alias' => 'fantastika'],
            ['title' => 'Фэнтези', 'alias' => 'fantasy']
        ]);
    }
}
