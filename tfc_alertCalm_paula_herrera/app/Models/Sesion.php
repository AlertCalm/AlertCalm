<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    protected $table = 'sessions';  // Especifica que la tabla en la base de datos se llama 'sessions'

    protected $fillable = [
        'user_id',
        'token_sesion',
        'inicio_sesion',
        'fin_sesion'
    ];
    //Una sesión solo puede pertenecer a un user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
