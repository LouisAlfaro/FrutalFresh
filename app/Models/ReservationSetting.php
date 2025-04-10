<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner_10_20',
        'banner_20_30',
        'banner_30_plus',
        'title_form',
    ];
}
