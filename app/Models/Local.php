<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'horario',
        'descripcion',
        'imagen',
        'googlemaps',
        'whatsapp',
        'pdf_carta',
    ];

    // Si tienes relación con la carta, por ejemplo:
    public function cartas()
    {
        return $this->hasMany(Carta::class);
    }
}
