<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Music;
use Faker\Factory as Faker;

class MusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insertar 10 registros de música en la tabla 'music'
        foreach (range(1, 10) as $index) {
            Music::create([
                'titulo'    => $faker->sentence(3), 
                'categoria' => $faker->randomElement(['relajacion', 'ansiedad', 'respiracion', 'motivacion', 'meditacion']),
                'file_url'  => $faker->url(), 
                'duracion'  => $faker->time('H:i:s'),  
                'lenguaje'  => $faker->randomElement(['es', 'en', 'fr']),  
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
