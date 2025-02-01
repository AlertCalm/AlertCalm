<?php
namespace Database\Seeders;
use Faker\Factory as Faker;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usamos Faker(libreria de laravel) para generar datos aleatorios
        $faker = Faker::create();

        // Crear 10 usuarios
        foreach (range(1, 10) as $index) {
            User::create([
                'username' => $faker->userName, 
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // Contraseña cifrada
                'localizacion' => $faker->city, 
                'edad' => $faker->numberBetween(18, 65), 
                'preferencias' => $faker->text(200), // Preferencias aleatorias
                'lenguaje' => 'es', 
            ]);
        }
    }

    //Para ejecutar el seeders: php artisan db:seed --class=UserSeeder
}
