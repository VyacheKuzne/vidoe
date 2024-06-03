<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\user_admins;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Создайте администратора
        user_admins::create([

            'email' => 'admin@mail.ru',
            'password' => 'oiSD$83s4Fda23d_S23',
          
        ]);
    
    }
}
