<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    protected $fillable = [
        'user_id',
        'tipo_fav',
        'item_id'
    ];

    // Un fav pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación con Musica (si es un favorito de meditation)
    public function meditacion()
    {
        return $this->belongsTo(Meditacion::class, 'item_id')->where('tipo_fav', 'meditation');
    }
 
    // Relación con Musica (si es un favorito de música)
    public function musica()
    {
        return $this->belongsTo(Music::class, 'item_id')->where('tipo_fav', 'music');
    }
}
