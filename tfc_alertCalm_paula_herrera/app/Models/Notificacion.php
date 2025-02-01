<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $fillable = [
        'user_id',
        'alert_id',
        'mensaje'
    ];

    // Una notificacion va a pertenecer a una sola alerta
    public function alerta()
    {
        return $this->belongsTo(Alerta::class, 'alert_id');
    }

    // Una notificacion pertenece a un user
    public function user()
    {
         return $this->belongsTo(User::class, 'user_id');
    }
}
