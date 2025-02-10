<?php

namespace Database\Seeders;

use App\Models\Alerta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AlertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insertar 5 alertas con datos aleatorios
        foreach (range(1, 10) as $index) {
            Alerta::create([
                'titulo'      => $faker->sentence(4),
                'descripcion' => $faker->paragraph(2),
                'tipo'        => $faker->randomElement(['inundacion', 'terremoto', 'incendio', 'otros']),
                'localizacion' => json_encode([ //arrayq eu se convierte en json
                    'lat' => $faker->latitude,
                    'lng' => $faker->longitude,

                ]),
                'peligro'     => $faker->randomElement(['baja', 'media', 'alta']),
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
