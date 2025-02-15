<?php
namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usamos Faker (librería de Laravel) para generar datos aleatorios
        $faker = Faker::create();

        // Crear 10 usuarios
        foreach (range(1, 10) as $index) {
            User::create([
                'name' => $faker->name,  // Generar nombre completo
                'email' => $faker->unique()->safeEmail, // Generar email único
                'email_verified_at' => now(), // Verificar el email automáticamente
                'password' => Hash::make('password'), // Contraseña cifrada
                'localizacion' => $faker->city,  // Ciudad aleatoria
                'edad' => $faker->numberBetween(18, 65), // Edad aleatoria
                'preferencias' => $faker->text(200), // Preferencias aleatorias
                'lenguaje' => 'es',  // Lenguaje por defecto
            ]);
        }
    }

    // Para ejecutar el seeders: php artisan db:seed --class=UserSeeder
}
