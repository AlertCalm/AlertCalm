<?php
namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'localizacion' => json_encode([
                    'lat' => $faker->latitude,
                    'lng' => $faker->longitude
                ]),  // Localización como un JSON
                'edad' => $faker->numberBetween(18, 65),
                'preferencias' => $faker->text(200),
                'lenguaje' => 'es',
            ]);
        }
    }
}