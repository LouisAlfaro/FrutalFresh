<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'especialidad',
        'telefono',
        'email',
        'region',
        'experiencia',
        'comentario',
        'attachment',
    ];
}
