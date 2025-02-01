<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    protected $fillable = [
        'user_id',
        'token_sesion',
        'inicio_sesion',
        'fin_sesion'
    ];

    //Una sesión solo puede pertenecer a un user
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
