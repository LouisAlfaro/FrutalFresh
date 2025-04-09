<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    use HasFactory;

    protected $fillable = [
        'local_id',
        'nombre',
        'descripcion',
        'precio',
        'imagen',
    ];

    public function local()
    {
        return $this->belongsTo(\App\Models\Local::class);
    }
    
}
