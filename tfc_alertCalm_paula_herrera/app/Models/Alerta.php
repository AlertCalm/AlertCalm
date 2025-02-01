<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    protected $fillable = [
        'tiutlo',
        'descripcion',
        'tipo',
        'localizacion',
        'peligro'
    ];


    // Una alerta va a tener un solo protocolo
    public function protocolo()
    {
        return $this->hasOne(Protocolo::class, 'alert_id');
    }

    // Una alerta tiene varias notificaciones
    public function notificacion()
    {
        return $this->hasMany(Notificacion::class, 'alert_id');
    }

}

