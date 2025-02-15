<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Meditation;
use Faker\Factory as Faker;

class MeditationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Insertar 10 registros de meditaciones en la tabla 'meditations'
        foreach (range(1, 10) as $index) {
            Meditation::create([
                'titulo'    => $faker->sentence(3),  // Título de la meditación (aleatorio)
                'categoria' => $faker->randomElement(['relajacion', 'respiracion', 'mindfulness', 'otra']),  // Categoría
                'file_url'  => $faker->url(),  // URL del archivo de la meditación
                'duracion'  => $faker->time('H:i:s'),  // Duración en formato H:i:s
                'lenguaje'  => $faker->randomElement(['es', 'en', 'fr']),  // Lenguaje aleatorio
                'created_at' => now(),  // Fecha de creación
                'updated_at' => now(),  // Fecha de actualización
            ]);
        }
    }
}
