<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            [
                'user_id' => 2,
                'film_id' => 1,
                'message' => 'Фильм шикарный ,супер .Стоит посмотреть'
            ],
            [
                'user_id' => 2,
                'film_id' => 2,
                'message' => 'Для меня это как обычная сказка, переделанная на более взрослую аудиторию. Есть противные моменты. Но в целом, было интересно.'
            ],
            [
                'user_id' => 2,
                'film_id' => 2,
                'message' => 'Для меня это как обычная сказка, переделанная на более взрослую аудиторию. Есть противные моменты. Но в целом, было интересно.'
            ],
        ]);
    }
}
