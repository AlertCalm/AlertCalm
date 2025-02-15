<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Favorito;
use App\Models\User;
use App\Models\Meditation;
use App\Models\Music;
use Faker\Factory as Faker;

class FavoritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Obtener todos los usuarios
        $usuarios = User::all();

        // Crear algunos favoritos para cada usuario
        foreach ($usuarios as $usuario) {
            // Generar algunos favoritos de meditaciones
            foreach (range(1, 3) as $index) {
                $meditacion = Meditation::inRandomOrder()->first(); // Obtener una meditación aleatoria

                // Crear un favorito para la meditación
                Favorito::create([
                    'user_id' => $usuario->id,
                    'tipo_fav' => 'meditation',
                    'item_id' => $meditacion->id,
                ]);
            }

            // Generar algunos favoritos de música
            foreach (range(1, 3) as $index) {
                $musica = Music::inRandomOrder()->first(); // Obtener una música aleatoria

                // Crear un favorito para la música
                Favorito::create([
                    'user_id' => $usuario->id,
                    'tipo_fav' => 'music',
                    'item_id' => $musica->id,
                ]);
            }
        }

        // Opcional: Generar algunos favoritos con datos falsos
        // Genera favoritos aleatorios asegurándonos que el item_id sea válido (meditación o música)
        foreach (range(1, 5) as $index) {
            // Aleatorio entre 'meditation' y 'music'
            $tipoFav = $faker->randomElement(['meditation', 'music']);

            if ($tipoFav == 'meditation') {
                // Obtener una meditación aleatoria
                $item = Meditation::inRandomOrder()->first();
            } else {
                // Obtener una música aleatoria
                $item = Music::inRandomOrder()->first();
            }

            // Crear un favorito para el usuario
            Favorito::create([
                'user_id' => $faker->numberBetween(1, 10), // Usuario aleatorio entre 1 y 10
                'tipo_fav' => $tipoFav,
                'item_id' => $item->id, // ID válido de la meditación o música aleatoria
            ]);
        }
    }
}
