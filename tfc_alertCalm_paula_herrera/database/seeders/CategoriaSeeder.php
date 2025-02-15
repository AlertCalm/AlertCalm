<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insertar datos de ejemplo
        Categoria::create([
            'nombreCategoria' => 'Relajación',
            'descripcion' => 'Categoría enfocada en contenido para relajación.',
            'imagenCategoria' => 'ruta/a/imagen_relajacion.jpg', // Asegúrate de poner la ruta correcta
        ]);

        Categoria::create([
            'nombreCategoria' => 'Ansiedad',
            'descripcion' => 'Contenido dirigido a ayudar con la ansiedad.',
            'imagenCategoria' => 'ruta/a/imagen_ansiedad.jpg', // Asegúrate de poner la ruta correcta
        ]);

        Categoria::create([
            'nombreCategoria' => 'Mindfulness',
            'descripcion' => 'Categoría enfocada en la práctica del mindfulness.',
            'imagenCategoria' => 'ruta/a/imagen_mindfulness.jpg', // Asegúrate de poner la ruta correcta
        ]);
    }
}
