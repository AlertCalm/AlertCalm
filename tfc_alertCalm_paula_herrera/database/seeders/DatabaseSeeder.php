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
        // User::factory(10)->create();
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User', 'password' => bcrypt('password')]
        );
        
        // Llamamos al UserSeeder
        $this->call([
            UserSeeder::class,
            AlertaSeeder::class,
            MeditationSeeder::class, 
            MusicSeeder::class,      
            PremiumSeeder::class,
            NotificacionSeeder::class,
            FavoritoSeeder::class
        ]);
        
    }
}
