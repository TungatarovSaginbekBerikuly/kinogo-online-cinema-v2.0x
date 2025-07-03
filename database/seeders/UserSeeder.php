<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@mail.ru',
                'password' => '$2y$12$2nuj7k11SZBjwVSanQ22D.Rwd38ePi/mlBJ4onklQrdFw2zF3kbdK', // 12345678
                'is_admin' => true,   
            ],
            [
                'name' => 'user',
                'email' => 'user@mail.ru',
                'password' => '$2y$12$2nuj7k11SZBjwVSanQ22D.Rwd38ePi/mlBJ4onklQrdFw2zF3kbdK', // 12345678
                'is_admin' => false,   
            ],
        ]);
    }
}
