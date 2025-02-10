<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
    protected $table = 'premium';
    protected $fillable = [
        'user_id',
        'activo',
        'fecha_inicio',
        'fecha_expiracion'
    ];

    // Una suscripción premium pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
