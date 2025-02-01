<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombreCategoria',
        'descripcion',
        'imagenCategoria'
    ];

    //Una categoría puede tener muchas meditaciones
    public function meditaciones()
    {
        return $this->belongsToMany(Meditacion::class);
    }

    //Una categoría puede tener muchas músicas
    public function musicas()
    {
        return $this->belongsToMany(Musica::class);
    }
}
