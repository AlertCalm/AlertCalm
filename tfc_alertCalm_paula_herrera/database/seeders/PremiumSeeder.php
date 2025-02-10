<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Premium;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class PremiumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            // Seleccionamos un usuario aleatorio existente de la tabla users
            $user = User::inRandomOrder()->first();

            Premium::create([
                'user_id' => $user->id, 
                'activo' => $faker->boolean,  
                'fecha_inicio' => $faker->dateTimeBetween('-1 year', 'now'), 
                'fecha_expiracion' => $faker->dateTimeBetween('now', '+1 year'), 
            ]);
    }   }
}
