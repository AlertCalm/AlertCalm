<?php

namespace Database\Seeders;
use App\Models\Notificacion;
use App\Models\User;
use App\Models\Alerta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NotificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Notificacion::create([
                'user_id' => User::inRandomOrder()->first()->id,  
                'alert_id' => Alerta::inRandomOrder()->first()->id, 
                'mensaje' => $faker->sentence(10),  
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
