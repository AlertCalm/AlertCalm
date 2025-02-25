<?php

namespace App\Models;

use App\Models\Meditation;
use App\Models\User;
use App\Models\Music;

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
        return $this->belongsTo(Meditation::class, 'item_id')
                    ->whereHas('favoritos', function ($query) {
                        $query->where('tipo_fav', 'meditation');
                    });
    }
   
    // Relación con Musica (si es un favorito de música)
     
    public function musica()
    {
        return $this->belongsTo(Music::class, 'item_id')
                    ->whereHas('favoritos', function ($query) {
                        $query->where('tipo_fav', 'music');
                    });
    }
}
