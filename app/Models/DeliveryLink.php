<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryLink extends Model
{
    protected $fillable = [
        'platform',
        'url',
        'image',
        'active',
    ];
}
