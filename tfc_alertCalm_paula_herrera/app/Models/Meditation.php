<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meditation extends Model
{
    protected $fillable = [
        'titulo',
        'categoria',
        'file_url',
        'duracion',
        'lenguaje'
    ];

    // Una meditación puede pertenceer a varias categorias
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }

    // una meditacion puede estar en varios favoritos
    public function favoritos()
    {
        return $this->hasMany(Favorito::class, 'item_id')->where('tipo_fav', 'meditation');
    }
}
