<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name', // Cambiado de 'username' a 'name'
        'email',
        'password',
        'localizacion',
        'edad',
        'preferencias',
        'lenguaje',
    ];


    // asegura que localizacion se maneja como un json
    protected $casts = [
        'localizacion' => 'array',
    ];

    // Una usuario va a tener un notificacion
    public function protocolo()
    {
        return $this->hasOne(Notificacion::class, 'user_id');
    }

    // Una user tiene varias notificaciones
    public function notificacion()
    {
        return $this->hasMany(Notificacion::class, 'user_id');
    }

    // Un user tiene muchas favs
    public function favorito()
    {
        return $this->hasMany(Favorito::class, 'user_id');
    }

    // Un user puede tener varias sesiones
    public function sesiones()
    {
        return $this->hasMany(Sesion::class);
    }

    // Un usuario solo puede tener una suscripción
    public function premium()
    {
        return $this->hasOne(Premium::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
