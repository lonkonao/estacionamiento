<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $fillable = [
        'fechaLlegada', 'operador', 'patente','horaLlegada', 'codigo','estado',
    ];
}
