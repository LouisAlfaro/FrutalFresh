<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;

    // Si cambiaste el nombre de la tabla, define la propiedad:
    // protected $table = 'promociones';

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'fecha_inicio',
        'fecha_fin',
    ];
}
