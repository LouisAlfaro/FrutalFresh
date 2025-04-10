<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'sede',
        'fecha',
        'hora',
        'numero_personas',
        'tipo_contacto',
        'contacto',
        'motivo',
        'mensaje',
    ];
}
