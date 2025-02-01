<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Protocolo extends Model
{
    protected $fillable = [
        'tipo_emergencia',
        'descripcion_protocolo',
        'alert_id',
        'documento_url'
    ];

    // Un protocolo pertenece a una alerta
    public function alerta()
    {
        return $this->belongsTo(Alerta::class, 'alert_id');
    }

   
}
