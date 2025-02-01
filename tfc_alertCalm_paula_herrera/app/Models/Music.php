<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = [
        'titulo',
        'categoria',
        'file_url',
        'duracion',
        'lenguaje'
    ];

    // una musica puede tener varios favoritos
    public function favoritos()
    {
        return $this->hasMany(Favorito::class, 'item_id')->where('tipo_fav', 'music');
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }
}
