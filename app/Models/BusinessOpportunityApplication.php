<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessOpportunityApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa',
        'rubro',
        'telefono',
        'email',
        'region',
        'provincia',
        'distrito',
        'comentario',
        'attachment',
    ];
}
